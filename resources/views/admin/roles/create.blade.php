<x-admin.modal-layout modalSize="modal-md">
    <x-slot name="header">
        Create New Role
    </x-slot>
    <x-form-errors />

    {!! Form::open(['route' => 'roles.store', 'method' => 'POST', 'data-remote' => 'true']) !!}
        @include('admin.roles.fields')
    {!! Form::close() !!}

</x-admin.modal-layout>
