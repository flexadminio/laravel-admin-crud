<x-admin.app-layout>
    <x-admin.page-header/>
    <x-form-alert :errors="$errors"/>

    {!! Form::open(['route' => 'products.store', 'method' => 'POST']) !!}
        @csrf
        @include('admin/products/fields')
    {!! Form::close() !!}
</x-admin.app-layout>
