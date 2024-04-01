<x-admin.modal-layout modalSize="modal-md">
    <x-slot name="header">
        Create New Role
    </x-slot>
    <x-form-errors />

    {{ html()->form('POST', route('roles.store'))->attributes(['data-remote' => 'true'])->open() }}
        @include('admin.roles.fields')
        @include('admin/share/form_actions')
    {{ html()->form()->close() }}

</x-admin.modal-layout>
