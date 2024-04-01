<x-admin.modal-layout modalSize="modal-md">
    <x-slot name="header">
        Update Tag
    </x-slot>
    <x-form-errors />
    {{ html()->modelForm($resource, 'PUT', route('tags.update', $resource->id))->attributes(['data-remote' => 'true'])->open() }}
        @csrf
        @method('PUT')
        @include('admin/tags/fields')
        @include('admin/share/form_actions')
    {{ html()->closeModelForm() }}

</x-admin.modal-layout>
