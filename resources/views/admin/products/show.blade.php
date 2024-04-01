<x-admin.app-layout>
    <x-admin.page-header />
    <div class="card p-5">
        <div class="card-body">
            <div class="row">
                <!-- begin col product-image -->
                <div class="col-lg-6 col-md-6 mb-md-0 mb-4">
                    <div class="product-image-box mb-4 rounded p-3 text-center">
                        <img id="product-img" src="{{ feature_image_url($product) }}" class="img-fluid" alt="Product Image">
                    </div>
                    <!-- begin product-gallery -->
                    <div class="product-gallery d-flex justify-content-center">
                        @foreach ($product->getMedia('attachments') as $attachment)
                            <a href="javascript: void(0);" class="product-gallery-item me-2">
                                <img src="{{ attachment_url($attachment) }}" class="img-fluid img-thumbnail p-2"
                                    style="max-width: 60px;" alt="{{ $attachment->name }}">
                            </a>
                        @endforeach
                    </div>
                    <!-- end product-gallery -->
                </div>
                <!-- end col product-image -->
                <!-- begin col product-detail -->
                <div class="col-lg-6 col-md-6">
                    <!-- begin product-detail -->
                    <div class="product-detail">
                        <h3 class="product-title">{{ $product->name }}</h3>
                        <div class="product-price mb-2">
                            <span class="price text-highlight fs-lg fw-700">${{ $product->price }}</span>
                        </div>
                        <!-- end product-price -->
                        <div class="rating-wrap">
                            <div class="rating">
                                <div class="product-rate" style="width:86%"></div>
                            </div>
                            <span class="rating-num">(21)</span>
                        </div>
                        <!-- end rating-wrap -->
                        <div class="product-desc mt-2">
                            {!! $product->detail !!}
                        </div>
                    </div>
                    <!-- end product-detail -->
                    <hr>
                    <ul class="product-meta list-unstyled">
                        <li>Category:
                            @foreach ($product->categories as $category)
                                <span class="badge bg-info">{{ $category->name }}</span>
                            @endforeach
                        </li>
                        <li>Tags:
                            @foreach ($product->tags as $tag)
                                <span class="badge bg-success">{{ $tag->name }}</span>
                            @endforeach
                        </li>
                    </ul>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <h5 class="fw-700">Available Stock:</h5>
                            <p class="lh-150 text-sm">{{ $product->quantity }}</p>
                        </div>
                        <div class="col-md-4">
                            <h5 class="fw-700">Number of Orders:</h5>
                            <p class="lh-150 text-sm">{{ $product->unit_sold }}</p>
                        </div>
                        <div class="col-md-4">
                            <h5 class="fw-700">Revenue:</h5>
                            <p class="lh-150 text-sm">$10,986,341</p>
                        </div>
                    </div>
                    <!-- end row -->
                    @can('product-edit')
                        <div class="row">
                            <div class="col-12">
                                <a class="btn btn-highlight" href="{{ route('products.edit', $product->id) }}">Edit</a>
                            </div>
                        </div>
                    @endcan
                </div>
                <!-- end col product-detail -->
            </div>
            <!-- end row -->
        </div>
    </div>
</x-admin.app-layout>
