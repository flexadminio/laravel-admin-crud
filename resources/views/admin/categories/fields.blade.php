<div class="row">
    <div class="col-12">
        <div class="form-group mb-3">
            {{ html()->label('Name <span class="text-danger">*</span>', 'name') }}
            {{ html()->text('name')->placeholder('Name')->class('form-control')->attributes(['required' => true]) }}
        </div>
    </div>
</div>
