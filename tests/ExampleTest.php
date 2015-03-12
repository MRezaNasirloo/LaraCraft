<?php namespace Tests;


use Laracasts\TestDummy\Factory;

class ExampleTest extends DBTestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testBasicExample()
	{
		$response = $this->call('GET', '/auth/login');

		$this->assertEquals(200, $response->getStatusCode());
	}

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testHomeController()
    {
        $user = Factory::create($this->namespaceModels . '\User');
        $this->be($user);
        $response = $this->call('GET', '/home');
        //var_dump($user->toArray());
        $this->assertEquals(200, $response->getStatusCode());
    }


}
