<x-admin.modal-layout modalSize="modal-md">
    <x-slot name="header">
        Create New Tag
    </x-slot>
    <x-form-errors />
    {{ html()->form('POST', route('tags.store'))->attributes(['data-remote' => 'true'])->open() }}
        @csrf
        @include('admin/tags/fields')
        @include('admin/share/form_actions')
    {{ html()->form()->close() }}
</x-admin.modal-layout>
