<?php namespace App\Http\Middleware;

use App\Models\Product\IOwner;
use App\Models\User;
use Closure;
use Illuminate\Auth\Guard;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Owner {

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
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        foreach($request->route()->parameters() as $name => $model){
            if($model instanceof IOwner && !($model->owner() == $this->user))
                throw new NotFoundHttpException;
        }
		return $next($request);
	}

}
