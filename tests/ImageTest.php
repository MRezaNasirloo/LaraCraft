<?php namespace Tests;


use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ImageTest extends DBTestCase {

    private $fileName = 'phpF4C9.tmp';
    private $filePath = '\public\phpF4C9.tmp';
    const DS = DIRECTORY_SEPARATOR;



    public function it_should_have_type_of_image()
    {
        $image = new Image(new UploadedFile(base_path() . $this->filePath , $this->fileName));
        $this->assertInstanceOf($this->namespaceModels. '\Image', $image);
    }


    public function it_should_return_array_of_all_size_paths()
    {
        $image = new Image(new UploadedFile(base_path() . $this->filePath , $this->fileName));

        $this->assertArrayHasKey('untouched', $image->getStorePath());
        $this->assertArrayHasKey('medium', $image->getStorePath());
        $this->assertArrayHasKey('thumb', $image->getStorePath());
    }


    public function it_should_put_all_variation_image_sizes_into_storage()
    {
        $image = new Image(new UploadedFile(base_path() . $this->filePath , $this->fileName));

        $paths = $image->put();

        $untouched = \File::get($paths['untouched']);
        $medium = \File::get($paths['medium']);
        $thumb = \File::get($paths['thumb']);

        $this->assertContains(0xff, $untouched);
        $this->assertContains(0xff, $medium);
        $this->assertContains(0xff, $thumb);

    }
}
