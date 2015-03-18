<?php namespace Tests;


use Laracasts\TestDummy\Factory;

class UserTest extends DBTestCase {

    /** @test */
    public function it_should_return_a_user_instance()
    {
        //$user = Factory::create('App\Models\User');
        $shop = Factory::create('Shop');
        $user = $shop->user()->first();
        //var_dump($user->toArray());
        //var_dump($shop->toArray());
        $this->assertEquals('App\Models\User',get_class($user));

    }

}
