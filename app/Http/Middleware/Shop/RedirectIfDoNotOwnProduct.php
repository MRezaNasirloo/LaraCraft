<?php namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Auth\Guard;
use Illuminate\Contracts\Routing\Middleware;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class RedirectIfDoNotOwnProduct implements Middleware {


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
            $product = $request->route()->getParameter('product');
            $owner = $product->shop()->first()->user()->first();
            if($this->user == $owner)
		        return $next($request);
        }
        throw new NotFoundHttpException;
	}

}
