<x-admin.modal-layout modalSize="modal-md">
    <x-slot name="header">
        Edit Role
    </x-slot>
    <x-form-errors />
    {{ html()->modelForm($role, 'PATCH', route('roles.update', $role->id))->attributes(['data-remote' => 'true'])->open() }}
        @include('admin.roles.fields')
        @include('admin.share.form_actions')
    {{ html()->closeModelForm() }}

</x-admin.app-layout>
