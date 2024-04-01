<x-admin.app-layout>
    <x-admin.page-header/>
    <x-form-alert :errors="$errors"/>
    <x-flash-message/>
    {{ html()->modelForm($product, 'POST', route('products.update', $product->id))->open() }}
        @csrf
        @method('PUT')
        @include('admin/products/fields')
    {{ html()->closeModelForm() }}
</x-admin.app-layout>
