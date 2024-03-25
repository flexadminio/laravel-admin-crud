<x-admin.modal-layout modalSize="modal-md">
    <x-slot name="header">
        Edit User
    </x-slot>
    <x-form-errors />

    {!! Form::model($user, ['method' => 'PATCH', 'route' => ['users.update', $user->id], 'data-remote' => 'true']) !!}
        @include('admin/users/fields')
    {!! Form::close() !!}
</x-admin.modal-layout>
