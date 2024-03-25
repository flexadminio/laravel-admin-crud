<x-admin.modal-layout modalSize="modal-md">
    <x-slot name="header">
        Create New User
    </x-slot>
    <x-form-errors />

    {!! Form::open(['route' => 'users.store', 'method' => 'POST', 'data-remote' => 'true']) !!}
        @include('admin/users/fields')
    {!! Form::close() !!}

</x-admin.modal-layout>
