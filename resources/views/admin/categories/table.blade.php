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
            <th>{{ _('Image') }}</th>
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
                <td>
                    <img class="img-thumbnail" alt="{{ $category->name }}" src="{{ resource_image_url($category) }}"
                        width="48">
                </td>
                <td>{{ $category->name }}</td>
                <td>
                    <ul class="list-unstyled table-actions">
                        @can('category-edit')
                        <li>
                            <x-admin.edit-button data-modal="true"
                                href="{{ route('categories.edit', $category->id) }}" />
                        </li>
                        @endcan
                        @can('category-delete')
                        <li>
                            <x-admin.delete-button data-url="{{ route('categories.destroy', $category->id) }}" />
                        </li>
                        @endcan
                    </ul>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
