<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckPincode
{
    public function handle(Request $request, Closure $next)
    {
        if (!$request->session()->has('pincode') && !$request->is('choose-pincode') && !$request->is('save-pincode')) {
            return redirect()->route('pincode.prompt');
        }

        return $next($request);
    }
}
