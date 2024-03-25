<?php

namespace App\View\Components\Admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ImageField extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public $name,
        public $attachable,
        public $alt
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.image-field');
    }
}
