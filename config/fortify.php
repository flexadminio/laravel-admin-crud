<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Home Path
    |--------------------------------------------------------------------------
    |
    | This is the path where users are redirected after authenticating or
    | verifying their email address via Laravel Fortify. It is kept in sync
    | with the Breeze auth controllers (which redirect to the "dashboard"
    | route) so every auth flow lands on the same page.
    |
    | Only the keys defined here override Fortify's package defaults; all
    | other Fortify options are merged in from vendor config automatically.
    |
    */

    'home' => '/dashboard',

];
