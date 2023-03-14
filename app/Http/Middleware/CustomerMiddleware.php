<?php

/**
 * PHP Version 8.1.11
 * Laravel Framework 9.43.0
 *
 * @category Middleware
 *
 * @author CWSPS154 <codewithsps154@gmail.com>
 * @license MIT License https://opensource.org/licenses/MIT
 *
 * @link https://github.com/CWSPS154
 *
 * Date 11/12/22
 * */

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CustomerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response|RedirectResponse) $next
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::User()->isCustomer()) {
            return $next($request);
        } else {
            abort(401);
        }
    }
}
