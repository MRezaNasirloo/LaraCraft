<?php

namespace spec\App\Models;


use PhpSpec\Laravel\LaravelObjectBehavior;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class UserSpec extends LaravelObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('App\Models\User');
    }

    function it_should_have_a_shop_object()
    {
        $this->beAnInstanceOf('App\Models\User');
        $this->hasShop()->shouldHaveType('App\Models\Shop');
    }
}
