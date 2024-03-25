<x-admin.modal-layout modalSize="modal-md">
    <x-slot name="header">
        Create New Tag
    </x-slot>
    <x-form-errors />

    {!! Form::open(['route' => 'tags.store', 'method' => 'POST', 'data-remote' => 'true']) !!}
        @csrf
        @include('admin/tags/fields')
        @include('admin/share/form_actions')
    {!! Form::close() !!}
</x-admin.modal-layout>
