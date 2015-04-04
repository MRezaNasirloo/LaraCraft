<?php namespace App\Models;


use File;
use Intervention\Image\ImageManager;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Image implements IFile {

    const DS = DIRECTORY_SEPARATOR;


    /**
     * File attributes
     *
     * @var String
     */
    protected $originalName;
    protected $name;
    protected $ext;
    protected $path;
    protected $size;
    protected $mime;
    /**
     *
     * @var string
     */
    protected $basePath = 'photos';
    protected $encodeType = '.jpg';
    protected $storePath = [];
    protected $imageSizes = [
        'untouched' => '',
        'medium' => '300x300',
        'thumb' => '150x150'
    ];


    /**
     * Makes sure the file with the same name does not exists in the Storage
     *
     * @param $storePath
     * @return string
     */
    private function makeUniquePath($todayPath, $size, $baseName)
    {
        $this->encodeType;
        $index = 0;
        do {
            $storePath = $todayPath . $baseName . $index++ . $size . $this->encodeType;
//            dd($storePath);
        } while (File::exists($storePath));

        return $storePath;
    }

    /**
     * @return string
     */
    public function getTodayPath()
    {
        return join(self::DS, [$this->basePath, date('Y'), date('m'), date('d')]);
    }

    /**
     * @return string
     */
    public function getBasePath()
    {
        return $this->basePath;
    }

    /**
     * Gets the base name without extension
     *
     * @return String
     */
    private function getBaseName()
    {
        return str_replace('.tmp', '', str_replace('php', '', $this->name));
    }

    /**
     * @return array
     */
    public function getStorePath()
    {
        $todayPath = $this->getTodayPath();
        $baseName = $this->getBaseName();
        $path = [];
        foreach ($this->imageSizes as $size => $value) {
            $path[$size] = $this->makeUniquePath($todayPath . self::DS, $size, $baseName);
        }
        return $path;
    }


    /**
     * @return mixed
     */
    public function getFullPath()
    {
        return $this->path . self::DS . $this->name;
    }


    /**
     * @return String
     */
    public function getOriginalName()
    {
        return $this->originalName;
    }


    /**
     * @return null|string
     */
    public function getMime()
    {
        return $this->mime;
    }

    /**
     * @return int|null
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @return string
     */
    public function getExt()
    {
        return $this->ext;
    }

    /**
     * @return String
     */
    public function getName()
    {
        return $this->name;
    }


    function __construct(UploadedFile $uploadedFile)
    {
        $this->originalName = $uploadedFile->getClientOriginalName();
        $this->ext = $uploadedFile->getClientOriginalExtension();
        $this->mime = $uploadedFile->getClientMimeType();
        $this->size = $uploadedFile->getClientSize();
        $this->path = $uploadedFile->getPath();
        $this->name = $uploadedFile->getFilename();
    }

    /**
     * Put the file into the Storage
     *
     * @return String
     */
    public function put()
    {
        $storePaths = $this->getStorePath();
        $manager = new ImageManager();
        foreach ($storePaths as $size => $path) {
            $size = array_get($this->imageSizes, $size);
            if (empty($size)) {
                $image = $manager->make($this->getFullPath());
            } else {
                $size = explode('x', $size);
                $image = $manager->make($this->getFullPath())->fit($size[0], $size[1]);
            }
//            dd(base_path() .self::DS. 'public' .self::DS. $this->getTodayPath());
            $this->makeTodayPath();//TODO: handle exceptions
            File::put($path, $image->encode('jpg'));
        }

        return $this->storePath = $storePaths;
    }

    /**
     * Get the file from the Storage
     *
     * @throw \Exception
     * @return mixed
     */
    public function get()
    {
        if (empty($this->storePath)) {
            throw new \Exception('File has not saved yet.');
        }
        $images = [];
        foreach ($this->storePath as $key => $path) {
            $images[$key] = File::get($path);
        }
        return $images;
    }

    /**
     * Get the file from the Storage
     *
     * @throw \Exception
     * @return mixed
     */
    public function getUntouched()
    {
        if (empty($this->storePath)) {
            throw new \Exception('File has not saved yet.');
        }
        $image = File::get($this->storePath['untouched']);

        return $image;
    }

    /**
     * Get the medium sized image from Storage
     *
     * @throw \Exception
     * @return mixed
     */
    public function getMedium()
    {
        if (empty($this->storePath)) {
            throw new \Exception('File has not saved yet.');
        }
        $image = File::get($this->storePath['medium']);

        return $image;
    }

    /**
     * Get the thumb from Storage
     *
     * @throw \Exception
     * @return mixed
     */
    public function getThumb()
    {
        if (empty($this->storePath)) {
            throw new \Exception('File has not saved yet.');
        }
        $image = File::get($this->storePath['thumb']);

        return $image;
    }

    /**
     * Move the file into Storage
     *
     * @return mixed
     */
    public function move()
    {
        // TODO: Implement move() method.
    }

    /**
     * Copy the file into Storage
     *
     * @return mixed
     */
    public function copy()
    {
        // TODO: Implement copy() method.
    }

    /**
     * @return bool
     */
    private function makeTodayPath()
    {
        return File::makeDirectory($this->getTodayPath(), 493, true, true);
    }

}