<?php namespace Tests;


use App\Models\Photo;
use Laracasts\TestDummy\Factory;

class PhotoTest extends DBTestCase {

    /** @test */
    public function it_should_have_type_photo()
    {

        $photo = new Photo([
            'untouched' => 'foo',
            'medium' => 'bar',
            'thumb' => 'baz',
            'mime' => 'biz'
        ]);

        $photo->save();
        $photo = Photo::find(1);

        $this->assertInstanceOf($this->namespaceModels . '\Photo', $photo);
    }

    /** @test */
    public function it_knows_which_class_bounded_with_it()
    {
        $photo = new Photo([
            'untouched' => 'foo',
            'medium' => 'bar',
            'thumb' => 'baz',
            'mime' => 'biz'
        ]);

        $product = Factory::create('Product');
        $product->photos()->save($photo);
        $photo = Photo::find(1);

        $this->assertInstanceOf($photo->imageable_type, $product);

    }
}
