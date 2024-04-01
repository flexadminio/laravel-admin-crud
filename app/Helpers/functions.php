<?php

use App\Enums\ProductStatus;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Vite;

if (! function_exists('class_name')) {
    function class_name($object)
    {
        $baseName = get_class($object);

        return str_replace('App\\Models\\', '', $baseName);
    }
}
if (! function_exists('product_status')) {
    function product_status($product)
    {
        if ($product->status == ProductStatus::Active) {
            $class = 'success';
        } elseif ($product->status == ProductStatus::Pending) {
            $class = 'warning';
        } elseif ($product->status == ProductStatus::Inactive) {
            $class = 'danger';
        } else {
            $class = 'primary';
        }

        return <<<HTML
    <span class="badge bg-{$class} rounded">
      {$product->statusName()}
    </span>
    HTML;
    }
}

if (! function_exists('permission_name_humanize')) {
    function permission_name_humanize($name)
    {
        return ucwords(str_replace('-', ' ', $name));
    }
}

if (! function_exists('str_humanize')) {
    function str_humanize($str)
    {
        return preg_replace('/(?!^)[A-Z]{2,}(?=[A-Z][a-z])|[A-Z][a-z]/', ' $0', $str);
    }
}

if (! function_exists('attachment_url')) {
    function attachment_url($attachment)
    {
        if ($attachment->disk == 's3') {
            return $attachment->getTemporaryUrl(Carbon::now()->addMinutes(5));
        }

        return $attachment->getUrl();
    }
}

if (! function_exists('resource_image_url')) {
    function resource_image_url($resource)
    {
        $images = $resource->getMedia('images');
        if (count($images) > 0) {
            return attachment_url($images->first());
        } else {
            return Vite::asset('resources/images/products/product-80x80.jpg');
        }
    }
}

if (! function_exists('feature_image_url')) {
    function feature_image_url($resource, $collection = 'attachments', $conversion = 'featured')
    {
        $featured = $resource->getMedia('attachments', ['featured' => 'true']);
        if (count($featured) > 0) {
            return attachment_url($featured->first());
        } else {
            return Vite::asset('resources/images/products/product-80x80.jpg');
        }
    }
}
