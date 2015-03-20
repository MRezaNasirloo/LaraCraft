<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Routing\Middleware;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RedirectIfHasNotShop implements Middleware{

    /**
     * @inheritdoc
     */
    public function handle($request, Closure $next)
    {
        if(!$request->user()->hasShop()) {
            return redirect('/shop/create');
        }
        return $next($request);
    }

}
