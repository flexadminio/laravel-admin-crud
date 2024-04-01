<x-admin.modal-layout modalSize="modal-md">
    <x-slot name="header">
        Create New Category
    </x-slot>
    <x-form-errors />
    
    {{ html()->form('POST', route('categories.store'))->attributes(['data-remote' => 'true'])->open() }}
        @csrf
        @include('admin/categories/fields')
        @include('admin/share/form_actions')
    {{ html()->form()->close() }}

</x-admin.modal-layout>
