<?php

namespace App\Http\Controllers\Auth;

trait RedirectsByRole
{
    /**
     * After customer login or registration, always land on the storefront dashboard.
     * Admins reach the admin area only by signing in at /admin/login.
     */
    protected function redirectTo(): string
    {
        return route('dashboard');
    }
}
