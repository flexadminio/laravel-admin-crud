<?php
  $defaultAttributes = [
    "class" => "flexadmin-ajax-delete-btn text-danger",
    "href" => "javascript:void(0);",
    "data-method" => "delete",
    "data-confirm" => "Are you sure you want to delete this item?",
  ];
?>

<a {{ $attributes->merge($defaultAttributes) }} >
    <i class="fa fa-trash" data-bs-original-title="Archive" data-bs-toggle="tooltip"></i>
</a>
