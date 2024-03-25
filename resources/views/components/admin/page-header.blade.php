<?php
$routeName = Route::currentRouteName();
$resourceNames = explode('.', $routeName);
$resourceName = ucfirst(str_singular($resourceNames[0]));
$actionName = ucfirst($resourceNames[1]);

$title = __(str_plural($resourceName));
$title = str_replace('_', ' ',str_plural($resourceName));
if ($actionName == 'Create') {
    $title = __("Add New {$resourceName}");
} elseif ($actionName == 'Edit') {
    $title = __("Edit {$resourceName}");
} elseif ($actionName == 'Show') {
    $title = __("Show {$resourceName}");
}
?>
<div>
     <nav aria-label="breadcrumb">
        <ol class="breadcrumb fs-base ps-0">
            <li class="breadcrumb-item"><a href="#">{{ config('app.name', 'FlexAdmin') }}</a></li>
            <li class="breadcrumb-item"><span><a href="{{ route($resourceNames[0].'.index') }}"> {{ __(str_replace('_', ' ',str_plural($resourceName))) }}</a></span>
            </li>
            @if ($actionName != null)
              <li class="breadcrumb-item active" aria-current="page">{{ __($actionName) }}</li>
            @endif
        </ol>
    </nav>
    <div name="header">
        <div class="row header justify-content-between mb-4">
            <div class="col-12">
                <h1 class="header-title h3">
                    <i class="fa fa-star text-highlight"></i>
                    {{ $title }}
                </h1>
            </div>
        </div>
    </div>
</div>
