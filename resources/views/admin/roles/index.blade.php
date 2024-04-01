<x-admin.app-layout>
    <x-admin.page-header/>

    <x-admin.index-toolbar>
        <x-slot:mainactions>
            @can('role-create')
            <a class="btn btn-highlight waves-effect" data-modal="true" href="{{ route('roles.create') }}">
                <i class="fa fa-plus-circle"></i>
                <span class="d-none d-md-inline">{{ _('Create New Role') }}</span>
            </a>
            @endcan
         </x-slot>
    </x-admin.index-toolbar>

    <x-flash-message/>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                @include('admin.roles.table')
            </div>
        </div>

        {!! $roles->render() !!}

</x-admin.app-layout>
