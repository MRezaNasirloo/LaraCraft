<?php namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Auth\Guard;
use Illuminate\Contracts\Routing\Middleware;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class RedirectIfDoNotOwnShop implements Middleware {


    /**
     * @var Guard
     */
    protected $auth;

    /**
     * @var User
     */
    protected $user;

    /**
     * Constructs a middleware for this request
     *
     * @param Guard $auth
     */
    function __construct(Guard $auth)
    {
        $this->auth = $auth;
        $this->user = $auth->user();
    }

    /**
	 * @inheritdoc
     *
     * TODO: Refactor to sign an interface contract
     *
	 */
	public function handle($request, Closure $next)
	{
        if($this->user) {
            $shop = $request->route()->getParameter('shop');
            $owner = $shop->user()->first();
            if($this->user == $owner)
		        return $next($request);
        }
        throw new NotFoundHttpException;
	}

}
