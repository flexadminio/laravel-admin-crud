<x-admin.modal-layout modalSize="modal-md">
    <x-slot name="header">
        Create New Category
    </x-slot>
    <x-form-errors />

    {!! Form::open(['route' => 'categories.store', 'method' => 'POST', 'data-remote' => 'true']) !!}
        @csrf
        @include('admin/categories/fields')
        @include('admin/share/form_actions')
    {!! Form::close() !!}

</x-admin.modal-layout>
