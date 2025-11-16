<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Logout
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //
        $user = $request->user();

        Auth ::logout($user);

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/') -> with('success', 'You have been logged out!');
    }
}
