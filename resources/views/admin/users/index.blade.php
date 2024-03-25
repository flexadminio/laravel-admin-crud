<x-admin.app-layout>
    <x-admin.page-header/>

    <x-admin.index-toolbar>
        <x-slot:mainactions>
            <a class="btn btn-highlight waves-effect" data-modal="true" href="{{ route('users.create') }}">
                <i class="fa fa-plus-circle"></i>
                <span class="d-none d-md-inline">{{ _('Create New User') }}</span>
            </a>
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

                                                <li><a href="{{ route('users.edit', $user->id) }}" data-modal="true" ><i class="fa fa-pen"
                                                            data-bs-original-title="Edit"
                                                            data-bs-toggle="tooltip"></i></a></li>

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
    {!! $users->links() !!}
</x-admin.app-layout>
