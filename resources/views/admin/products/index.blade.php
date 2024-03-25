<x-admin.app-layout>

    <x-admin.page-header/>
    <x-admin.index-toolbar>
        <x-slot:mainactions>
            <a class="btn btn-highlight waves-effect" href="{{ route('products.create') }}">
                <i class="fa fa-plus-circle"></i>
                <span class="d-none d-md-inline">{{ _('Create New Product') }}</span>
            </a>
         </x-slot>
    </x-admin.index-toolbar>

    <x-flash-message/>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        @include('admin/products/table')
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! $products->links() !!}
</x-admin.app-layout>
