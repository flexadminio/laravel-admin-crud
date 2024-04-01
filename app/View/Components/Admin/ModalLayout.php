<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;
use Illuminate\View\View;

class ModalLayout extends Component
{
    public function __construct(
        public $modelSize = 'modal-lg',
    ) {
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('layouts.admin.modal');
    }
}
