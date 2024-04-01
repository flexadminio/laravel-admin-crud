<?php 
    $rolePermissions = [];
    if(isset($role)){
        $rolePermissions = $role->permissions->pluck('id')->toArray();
    }
?>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group mb-3">
            {{ html()->label('Name <span class="text-danger">*</span>', 'name') }}
            {{ html()->text('name')->placeholder('Name')->class('form-control')->attributes(['required' => true]) }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group mb-3">
            <label for="permission">Permissions</label>
            <div class="custom-scroll" style="max-height: 400px;">
                @foreach ($permissions as $value)
                    <label class="custom-checkbox">
                        {{ html()->checkbox('permission[]', in_array($value->id, $rolePermissions) ? true : false, $value->id)->class('name') }}
                        <span></span>
                        {{ permission_name_humanize($value->name) }}
                    </label>
                @endforeach
            </div>
        </div>
    </div>
</div>
