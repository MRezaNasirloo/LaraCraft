<?php namespace App\Providers;

use Closure;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class RouteServiceProvider extends ServiceProvider {

	/**
	 * This namespace is applied to the controller routes in your routes file.
	 *
	 * In addition, it is set as the URL generator's root namespace.
	 *
	 * @var string
	 */
	protected $namespace = 'App\Http\Controllers';

	/**
	 * Define your route model bindings, pattern filters, etc.
	 *
	 * @param  \Illuminate\Routing\Router  $router
	 * @return void
	 */
	public function boot(Router $router)
	{
		parent::boot($router);

        $this->bindModelField($router, 'shop', 'slug', 'App\Models\Shop');

        $this->bindModelField($router, 'product', 'slug', 'App\Models\Product\Product');

//		$this->model('shop', 'App\Models\Shop');//Laravel Old Bindings
	}

	/**
	 * Define the routes for the application.
	 *
	 * @param  \Illuminate\Routing\Router  $router
	 * @return void
	 */
	public function map(Router $router)
	{
		$router->group(['namespace' => $this->namespace], function($router)
		{
			require app_path('Http/routes.php');
		});
	}

    /**
     * Binds the given Model with the given key and field
     *
     * @param Router $router
     * @param $key
     * @param $field
     * @param $class
     *
     * @return Model
     *
     * @throws NotFoundHttpException
     */
    private function bindModelField(Router $router, $key, $field, $class)
    {
        $router->bind($key, function ($value) use ($field, $class) {
            $model = (new $class)->where($field, '=', $value)->first();
            if ($model == null)
                throw new NotFoundHttpException;
            return $model;
        });
    }

    /** 
     * Register a model binder for a wildcard.
     *
     * @param  string  $key
     * @param  string  $class
     * @param  \Closure|null  $callback
     * @return void
     *
     * @throws NotFoundHttpException
     */
    public function model($key, $class, $router,Closure $callback = null)//TODO: extend this class
    {
        $router->bind($key, function($value) use ($class, $callback)
        {
            if (is_null($value)) return;

            // For model binders, we will attempt to retrieve the models using the first
            // method on the model instance. If we cannot retrieve the models we'll
            // throw a not found exception otherwise we will return the instance.
            if ($model = (new $class)->where('slug','=',$value)->first())
            {
                return $model;
            }

            // If a callback was supplied to the method we will call that to determine
            // what we should do when the model is not found. This just gives these
            // developer a little greater flexibility to decide what will happen.
            if ($callback instanceof Closure)
            {
                return call_user_func($callback, $value);
            }

            throw new NotFoundHttpException;
        });
    }

}
