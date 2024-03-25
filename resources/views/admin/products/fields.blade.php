<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group mb-3">
                            {!! Html::decode(Form::label('name', 'Name <span class="text-danger">*</span>')) !!}
                            {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control', 'required']) !!}
                        </div>
                        <div class="form-group mb-3">
                            {!! Html::decode(Form::label('detail', 'Detail <span class="text-danger">*</span>')) !!}
                            <x-admin.quill-editor name='detail' :value="$product->detail" />
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end card-body -->
        </div>
      
        <div class="card">
            <div class="card-body">
                <h4>Pricing</h4>
                <div class="row border-bottom mb-3">
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            {!! Form::label('price', 'Price') !!}
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                {!! Form::input('number','price', null, ['placeholder' => 'Price', 'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <label for="product-quantity">Quantity</label>
                            {!! Form::label('quantity', 'Quantity') !!}
                            {!! Form::input('number','quantity', null, ['placeholder' => 'Quantity', 'class' => 'form-control']) !!}
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
                <div class="row mt-3">
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            {!! Form::label('unit_sold', 'Units Sold') !!}
                            {!! Form::input('number','unit_sold', null, ['placeholder' => 'Units Sold', 'class' => 'form-control']) !!}
                            <span class="help-block">
                                <small>Customers won’t see this</small>
                            </span>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-lg-6 d-flex align-items-center">
                        <label class="custom-checkbox">
                            {!! Form::checkbox('charge_tax', '1' ) !!}
                            Charge tax on this product
                            <span></span>
                        </label>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end card-body -->
        </div>

    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    {!! Form::label('status', 'Status') !!}
                    {!! Form::select('status', App\Enums\ProductStatus::toSelectArray(), null, [
                        'class' => 'form-control input-lg select2',
                        'id' => 'product-status',
                        'data-placeholder' => 'Select status',
                    ]) !!}
                </div>
            </div>
            <!-- end card-body -->
        </div>
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    {!! Form::label('categories', 'Categories') !!}
                    {!! Form::select('categories[]', $categories, null, [
                        'class' => 'form-control input-lg select2',
                        'multiple',
                        'id' => 'product-categories',
                        'data-placeholder' => 'Choose at least one category',
                    ]) !!}
                </div>
            </div>
            <!-- end card-body -->
        </div>
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    {!! Form::label('tags', 'Tags') !!}
                    {!! Form::select('tags[]', $tags, null, [
                        'class' => 'form-control input-lg select2',
                        'multiple',
                        'id' => 'product-tags',
                        'data-placeholder' => 'Choose at least one tag',
                    ]) !!}
                </div>
            </div>
            <!-- end card-body -->
        </div>

        @include('admin/products/form_actions')
    </div>
</div>
