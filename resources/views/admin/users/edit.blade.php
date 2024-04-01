<x-admin.modal-layout modalSize="modal-md">
    <x-slot name="header">
        Edit User
    </x-slot>
    <x-form-errors />

    {{ html()->modelForm($user, 'PATCH', route('users.update', $user->id))->attributes(['data-remote' => 'true'])->open() }}
        @include('admin/users/fields')
        @include('admin/share/form_actions')
    {{ html()->closeModelForm() }}
</x-admin.modal-layout>
