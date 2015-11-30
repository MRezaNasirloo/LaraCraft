<?php

namespace App\API\V1\Http\Middleware;

use App\Models\Product\IOwner;
use Closure;
use League\OAuth2\Server\Exception\AccessDeniedException;
use LucaDegasperi\OAuth2Server\Authorizer;

/**
 * Created by PhpStorm.
 * User: Mamareza
 * Date: 2015-11-30
 * Time: 8:08 PM
 */
class Owner
{
    /**
     * The Authorizer instance.
     *
     * @var \LucaDegasperi\OAuth2Server\Authorizer
     */
    protected $authorizer;

    /**
     * Create a new oauth user middleware instance.
     *
     * @param Authorizer|\LucaDegasperi\OAuth2Server\Authorizer $authorizer
     */
    public function __construct(Authorizer $authorizer)
    {
        $this->authorizer = $authorizer;
    }

    /**
     * Checks if the the request is submitted by the owner of this model or not.
     *
     * A route model bounding should be assigned to requested route here {@link \App\Providers\RouteServiceProvider}
     *
     * @param \Illuminate\Http\Request $request
     * @param Closure|\Closure $next
     * @return mixed
     * @throws AccessDeniedException
     */
    public function handle($request, Closure $next)
    {
        $this->authorizer->setRequest($request);

        foreach($request->route()->parameters() as $name => $model){
            if($model instanceof IOwner && !($model->owner()->id == $this->authorizer->getResourceOwnerid()))
                throw new AccessDeniedException();
        }

        return $next($request);
    }
}
