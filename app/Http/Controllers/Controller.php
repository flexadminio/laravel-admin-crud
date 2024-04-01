<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\View\View;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function render_in_modal($template, $data = null): View
    {
        return view($template, $data);
    }

    public function ownerClass($ownerKey)
    {
        $className = 'App\\Models\\'.ucfirst($ownerKey);
        $klass = new \ReflectionClass($className);

        return $klass->name;
    }

    public function owner($ownerKey, $ownerId)
    {
        if ($ownerId != null) {
            $ownerClass = $this->ownerClass($ownerKey);

            return $ownerClass::find($ownerId);
        } else {
            return null;
        }
    }
}
