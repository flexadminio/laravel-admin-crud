<table id="product-datatable" class="resources-datatable table-middle table-hover table-responsive table">
    <thead>
        <tr>
            <th>No</th>
            <th class="no-sort">
                <label class="custom-checkbox">
                    <input type="checkbox" class="parent-checkbox">
                    <span></span>
                </label>
            </th>
            <th>View</th>
            <th class="no-sort">Image</th>
            <th>Name</th>
            <th>Category</th>
            <th>Tag</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Units Sold</th>
            <th>Status</th>
            <th class="no-sort text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr class="item">
                <td>{{ ++$i }}</td>
                <td>
                    <label class="custom-checkbox">
                        <input type="checkbox" class="child-checkbox"
                            data-id="{{ $product->id }}">
                        <span></span>
                    </label>
                </td>
                <td><a href="{{ route('products.show', $product->id) }}"><i class="fa fa-eye"
                            data-bs-original-title="View" data-bs-toggle="tooltip"></i></a></li>
                </td>
                <td>
                    <a href="{{ route('products.edit', $product->id) }}">
                        <img class="img-thumbnail" alt="Product"
                            src="{{ feature_image_url($product) }}" width="48">
                    </a>
                </td>
                <td><a
                        href="{{ route('products.edit', $product->id) }}">{{ $product->name }}</a>
                </td>
                <td>
                    @foreach ($product->categories as $category)
                        <span class="badge bg-info">{{ $category->name }}</span>
                    @endforeach
                </td>
                <td>
                    @foreach ($product->tags as $tag)
                        <span class="badge bg-success">{{ $tag->name }}</span>
                    @endforeach
                </td>
                <td>${{ $product->price }}</td>
                <td>{{ $product->quantity }}</td>
                <td>{{ $product->unit_sold }}</td>
                <td>
                    {!! product_status($product) !!}
                </td>
                <td>
                    <ul class="list-unstyled table-actions">
                        @can('product-edit')
                            <li>
                              <x-admin.edit-button href="{{ route('products.edit', $product->id) }}" />
                            </li>
                        @endcan
                        @can('product-delete')
                            <li>
                                <x-admin.delete-button data-url="{{ route('products.destroy', $product->id) }}" />
                            </li>
                        @endcan
                    </ul>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>