<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Response;

class HasInvoice {

    public function handle(Request $request, \Closure $next): Response | Redirect {

        if($request->session()->has('invoice')) {
            return $next($request);
        }

        return Redirect::route('home');

    }

}
