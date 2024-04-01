<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class PageController extends BaseController
{
    public function authentication_confirm_email()
    {
        $page_title = 'Authentication - Confirm Email';
        $page_description = 'Some description';

        $action = __FUNCTION__;

        return view('page.authentication.confirm-email', compact('page_title', 'page_description', 'action'));
    }

    public function authentication_forgot_password()
    {
        $page_title = 'Authentication - Forgot Password';
        $page_description = 'Some description';

        $action = __FUNCTION__;

        return view('page.authentication.forgot-password', compact('page_title', 'page_description', 'action'));
    }

    public function authentication_login()
    {
        $page_title = 'Authentication - Login';
        $page_description = 'Some description';

        $action = __FUNCTION__;

        return view('page.authentication.login', compact('page_title', 'page_description', 'action'));
    }

    public function authentication_register()
    {
        $page_title = 'Authentication - Register';
        $page_description = 'Some description';

        $action = __FUNCTION__;

        return view('page.authentication.register', compact('page_title', 'page_description', 'action'));
    }

    public function error_404()
    {
        $page_title = 'Error 404';
        $page_description = 'Some description';

        $action = __FUNCTION__;

        return view('page.error.404', compact('page_title', 'page_description', 'action'));
    }

    public function error_500()
    {
        $page_title = 'Error 500';
        $page_description = 'Some description';

        $action = __FUNCTION__;

        return view('page.error.500', compact('page_title', 'page_description', 'action'));
    }

    public function contact()
    {
        $page_title = 'Contact';
        $page_description = 'Some description';

        $action = __FUNCTION__;

        return view('page.contact', compact('page_title', 'page_description', 'action'));
    }

    public function faq()
    {
        $page_title = 'FAQ';
        $page_description = 'Some description';

        $action = __FUNCTION__;

        return view('page.faq', compact('page_title', 'page_description', 'action'));
    }

    public function invoice()
    {
        $page_title = 'Invoice';
        $page_description = 'Some description';

        $action = __FUNCTION__;

        return view('page.invoice', compact('page_title', 'page_description', 'action'));
    }

    public function maintenance()
    {
        $page_title = 'Maintenance';
        $page_description = 'Some description';

        $action = __FUNCTION__;

        return view('page.maintenance', compact('page_title', 'page_description', 'action'));
    }

    public function pricing()
    {
        $page_title = 'Pricing';
        $page_description = 'Some description';

        $action = __FUNCTION__;

        return view('page.pricing', compact('page_title', 'page_description', 'action'));
    }

    public function profile()
    {
        $page_title = 'Profile';
        $page_description = 'Some description';

        $action = __FUNCTION__;

        return view('page.profile', compact('page_title', 'page_description', 'action'));
    }

    public function starter()
    {
        $page_title = 'Starter';
        $page_description = 'Some description';

        $action = __FUNCTION__;

        return view('page.starter', compact('page_title', 'page_description', 'action'));
    }
}
