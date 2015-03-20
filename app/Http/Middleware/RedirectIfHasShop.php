<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Routing\Middleware;
use Illuminate\Support\Facades\Auth;

class RedirectIfHasShop implements Middleware{

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        if($request->user()->hasShop()) {
            return redirect('/shop/' . Auth::user()->shop()->first()->slug);
        }
		return $next($request);
	}

}
