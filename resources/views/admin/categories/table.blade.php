<table class="resources-datatable table-middle table-hover table-responsive table">
    <thead>
        <tr>
            <th>{{ _('No') }}</th>
            <th class="no-sort">
                <label class="custom-checkbox">
                    <input type="checkbox" class="parent-checkbox">
                    <span></span>
                </label>
            </th>
            <th>{{ _('ID') }}</th>
            <th>{{ _('Name') }}</th>
            <th class="no-sort text-center">{{ _('Action') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($collection as $category)
            <tr class="item">
                <td>{{ ++$i }}</td>
                <td>
                    <label class="custom-checkbox">
                        <input type="checkbox" class="child-checkbox" data-id="{{ $category->id }}">
                        <span></span>
                    </label>
                </td>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    <ul class="list-unstyled table-actions">
                        <li>
                            <x-admin.edit-button data-modal="true"
                                href="{{ route('categories.edit', $category->id) }}" />
                        </li>
                        <li>
                            <x-admin.delete-button data-url="{{ route('categories.destroy', $category->id) }}" />
                        </li>
                    </ul>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
