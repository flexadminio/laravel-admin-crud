<table class="table-middle table-hover table-responsive table">
    <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Permissions</th>
            <th class="no-sort text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($roles as $key => $role)
            <tr class="item">
                <td>{{ ++$i }}</td>
                <td>{{ $role->name }}</td>
                <td>
                    @if (!empty($role->getPermissionNames()))
                        @foreach ($role->getPermissionNames() as $v)
                            <label class="badge bg-highlight">{{ permission_name_humanize($v) }}</label>
                        @endforeach
                    @endif
                </td>
                <td>
                    <ul class="list-unstyled table-actions">
                        @can('role-edit')
                            <li>
                                <x-admin.edit-button data-modal="true" href="{{ route('roles.edit', $role->id) }}" />
                            </li>
                        @endcan
                        @can('role-delete')
                            <li>
                                <x-admin.delete-button data-url="{{ route('roles.destroy', $role->id) }}" data-confirm="Are you sure you want to delete this role?"/>
                            </li>
                        @endcan
                    </ul>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
