<?php

namespace spec\App\Models;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ImageSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(new UploadedFile(join(DIRECTORY_SEPARATOR, ['storage', 'app', 'foo.tmp']), 'foo.tmp'));
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('App\Models\Image');
    }

    /*function it_should_return_file_store_path(){
        $this->getStorePath()->shouldBe(join(DIRECTORY_SEPARATOR, ['photos', date('Y'), date('m'), date('d'),'php9D7C.tmp']));
    }*/

    function it_should_return_file_full_path(){
        $this->getFullPath()->shouldBe(join(DIRECTORY_SEPARATOR, ['storage', 'app', 'foo.tmp']));
    }

    function it_should_return_today_path(){
        $this->getTodayPath()->shouldReturn(join(DIRECTORY_SEPARATOR, ['photos', date('Y'), date('m'), date('d')]));
    }

}
