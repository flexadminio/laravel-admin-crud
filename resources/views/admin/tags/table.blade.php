<table class="resources-datatable table-middle table-hover table-responsive table">
    <thead>
        <tr>
            <th>{{ __('No') }}</th>
            <th class="no-sort">
                <label class="custom-checkbox">
                    <input type="checkbox" class="parent-checkbox">
                    <span></span>
                </label>
            </th>
            <th>{{ _('Name') }}</th>
            <th class="no-sort text-center">{{ __('Action') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($collection as $tag)
            <tr class="item">
                <td>{{ ++$i }}</td>
                <td>
                    <label class="custom-checkbox">
                        <input type="checkbox" class="child-checkbox" data-id="{{ $tag->id }}">
                        <span></span>
                    </label>
                </td>
                <td>{{ $tag->name }}</td>
                <td>
                    <ul class="list-unstyled table-actions">
                        @can('tag-edit')
                        <li>
                          <x-admin.edit-button data-modal="true" href="{{ route('tags.edit', $tag->id) }}" />
                        </li>
                        @endcan
                        @can('tag-edit')
                        <li>
                          <x-admin.delete-button data-url="{{ route('tags.destroy', $tag->id) }}" />
                        </li>
                        @endcan
                    </ul>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>