<div class="row">
    <div class="col-12">
        <div class="form-group mb-3">
            {!! Html::decode(Form::label('name', 'Name <span class="text-danger">*</span>')) !!}
            {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control', 'required']) !!}
        </div>
    </div>
</div>
