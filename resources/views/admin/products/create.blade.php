<x-admin.app-layout>
    <x-admin.page-header/>
    <x-form-alert :errors="$errors"/>
    {{ html()->form('POST', '/admin/products')->open() }}
        @csrf
        @include('admin/products/fields')
    {{ html()->form()->close() }}
</x-admin.app-layout>
