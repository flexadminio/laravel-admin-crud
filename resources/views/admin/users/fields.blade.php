<div class="row">
    <div class="col-12">
        <div class="form-group mb-3">
            {{ html()->label('Name <span class="text-danger">*</span>', 'name') }}
            {{ html()->text('name')->placeholder('Name')->class('form-control')->attributes(['required' => true]) }}
        </div>
    </div>
    <div class="col-12">
        <div class="form-group mb-3">
            {{ html()->label('Email <span class="text-danger">*</span>', 'email') }}
            {{ html()->email('email')->placeholder('Email')->class('form-control')->attributes(['required' => true]) }}
        </div>
    </div>
    <div class="col-12">
        <div class="form-group mb-3">
            {{ html()->label('Password <span class="text-danger">*</span>', 'password') }}
            {{ html()->password('password')->placeholder('Password')->class('form-control')->attributes(['required' => true]) }}
        </div>
    </div>
    <div class="col-12">
        <div class="form-group mb-3">
            {{ html()->label('Confirm Password <span class="text-danger">*</span>', 'confirm_password') }}
            {{ html()->password('confirm_password')->placeholder('Confirm Password')->class('form-control')->attributes(['required' => true]) }}
        </div>
    </div>
    <div class="col-12">
        <div class="form-group mb-3">
            <?php
              if (isset($user)) {
                $userRoles = $user->roles->pluck('name', 'name')->all();
              } else {
                $userRoles = array();
              }
            ?>
            {{ html()->label('Roles', 'roles') }}
            {{ html()->multiselect('roles', $roles, $userRoles)
                    ->class('form-control input-lg select2')
                    ->id('roles')
                    ->attributes(['data-placeholder' => 'Select roles']) }}
        </div>
    </div>
</div>