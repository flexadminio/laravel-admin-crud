<x-admin.app-layout>
    <x-admin.page-header/>
    <x-form-alert :errors="$errors"/>
    <x-flash-message/>

    {!! Form::model($product, ['method' => 'POST', 'route' => ['products.update', $product->id]]) !!}
        @csrf
        @method('PUT')
        @include('admin/products/fields')
    {!! Form::close() !!}
</x-admin.app-layout>
