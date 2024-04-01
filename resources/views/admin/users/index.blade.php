<x-admin.app-layout>
    <x-admin.page-header/>

    <x-admin.index-toolbar>
        <x-slot:mainactions>
            @can('user-create')
            <a class="btn btn-highlight waves-effect" data-modal="true" href="{{ route('users.create') }}">
                <i class="fa fa-plus-circle"></i>
                <span class="d-none d-md-inline">{{ _('Create New User') }}</span>
            </a>
            @endcan
         </x-slot>
    </x-admin.index-toolbar>

    <x-flash-message/>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="ecommerce-datatable" class="table-middle table-hover table-responsive table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Roles</th>
                                    <th class="no-sort text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr class="item">
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @if (!empty($user->getRoleNames()))
                                                @foreach ($user->getRoleNames() as $v)
                                                    <label class="badge bg-highlight">{{ $v }}</label>
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>
                                            <ul class="list-unstyled table-actions">
                                                @can('user-edit')
                                                <li>
                                                    <a href="{{ route('users.edit', $user->id) }}" data-modal="true" ><i class="fa fa-pen"
                                                            data-bs-original-title="Edit"
                                                            data-bs-toggle="tooltip"></i>
                                                    </a>
                                                </li>
                                                @endcan
                                                @can('user-delete')
                                                <li>
                                                    <a href="javascript:void(0);"
                                                        data-url="{{ route('users.destroy', $user->id) }}"
                                                        class="flexadmin-ajax-delete-btn text-danger"
                                                        data-method="delete"
                                                        data-confirm="Are you sure you want to delete this user?">
                                                        <i class="fa fa-trash" data-bs-original-title="Archive"
                                                            data-bs-toggle="tooltip"></i>
                                                    </a>
                                                </li>
                                                @endcan
                                            </ul>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! $users->links('pagination::bootstrap-5') !!}
</x-admin.app-layout>
