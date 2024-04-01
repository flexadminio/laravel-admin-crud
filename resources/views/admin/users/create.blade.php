<x-admin.modal-layout modalSize="modal-md">
    <x-slot name="header">
        Create New User
    </x-slot>
    <x-form-errors />

    {{ html()->form('POST', route('users.store'))->attributes(['data-remote' => 'true'])->open() }}
        @include('admin/users/fields')
        @include('admin/share/form_actions')
    {{ html()->form()->close() }}

</x-admin.modal-layout>
