<x-admin.modal-layout modalSize="modal-md">
    <x-slot name="header">
        Edit Role
    </x-slot>
    <x-form-errors />

    {!! Form::model($role, ['method' => 'PATCH', 'route' => ['roles.update', $role->id], 'data-remote' => "true"]) !!}
        @include('admin.roles.fields')
    {!! Form::close() !!}

</x-admin.app-layout>
