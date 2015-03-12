<?php namespace Tests;

use Illuminate\Foundation\Testing\TestCase;
use Laracasts\TestDummy\Factory;

class DBTestCase extends TestCase {

    protected $namespaceModels = 'App\Models';
    protected $namespaceProduct = 'App\Models\Product';

	/**
	 * Creates the application.
	 *
	 * @return \Illuminate\Foundation\Application
	 */
	public function createApplication()
	{
		$app = require __DIR__ . '/../../bootstrap/app.php';

		$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

		return $app;
	}

    /**
     * Setup before each test.
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();

        Factory::$factoriesPath = __DIR__.'/../factories';

//        $this->registerServiceProviders();

        $this->app['config']->set('database.default','sqlite');
        $this->app['config']->set('database.connections.sqlite.database', ':memory:');

        $this->migrate();
    }

    /**
     * Registers package service providers.
     *
     * @return array
     */
    /*public function registerServiceProviders()
    {
        foreach ($this->getServiceProviders() as $provider)
        {
            $this->app->register($provider);
        }
    }*/

    /**
     * run package database migrations
     *
     * @return void
     */
    public function migrate()
    {
        (new Migrator)->migrateDirectory($this->getMigrationsDirectory());
    }

    /**
     * Returns an array of package service providers
     *
     * @return array
     */
    //abstract public function getServiceProviders();

    /**
     * Returns path to migration files
     *
     * @return string
     */
    public function getMigrationsDirectory()
    {
        return __DIR__ . '/../../database/migrations';
    }

}
