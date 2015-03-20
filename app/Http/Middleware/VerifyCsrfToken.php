<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Routing\Middleware;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier implements Middleware{

	/**
	 * @inheritdoc
	 */
	public function handle($request, Closure $next)
	{
		return parent::handle($request, $next);
	}

}
