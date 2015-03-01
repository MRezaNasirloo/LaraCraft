<?php namespace Tests;


use Laracasts\TestDummy\Factory;

class UserTest extends DBTestCase {

    /** @test */
    public function it_should_return_a_shop_instance()
    {
        $user = Factory::create('App\Models\User');
        $shop = $user->shop()->first();
        var_dump($shop);

    }

}
