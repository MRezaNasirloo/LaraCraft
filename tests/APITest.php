<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 * Created by PhpStorm.
 * User: Mamareza
 * Date: 2015-11-20
 * Time: 9:49 PM
 */

class APITest extends TestCase
{

    use DatabaseTransactions
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
//        $this->withoutMiddleware();

        $this->visit('/api/shops/1')
            ->seeJson(["id"=> "1"]);
    }

}
