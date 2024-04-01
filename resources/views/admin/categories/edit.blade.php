<x-admin.modal-layout modalSize="modal-md">
    <x-slot name="header">
        Update Category
    </x-slot>
    <x-form-errors />
    {{ html()->modelForm($resource, 'POST', route('categories.update', $resource->id))->attributes(['data-remote' => 'true'])->open() }}
        @csrf
        @method('PUT')

        @include('admin/categories/fields')
        @include('admin/share/form_actions')
    {{ html()->closeModelForm() }}

</x-admin.modal-layout>
