<x-admin.modal-layout modalSize="modal-md">
    <x-slot name="header">
        Update Category
    </x-slot>
    <x-form-errors />

    {!! Form::model($resource, ['method' => 'PUT', 'route' => ['categories.update', $resource->id], 'data-remote' => "true"]) !!}
        @csrf
        @method('PUT')

        @include('admin/categories/fields')
        @include('admin/share/form_actions')
    {!! Form::close() !!}

</x-admin.modal-layout>
