<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectIfHasNotShop {


    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!$request->user()->hasShop()) {
            return redirect('/shop/create');
        }
        return $next($request);
    }

}
