<?php namespace App\Models;

use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;

class Photo extends BaseModel {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'photos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'imageable_type',
        'imageable_id',
        'untouched',
        'medium',
        'thumb',
        'mime',
    ];

    /**
     * @var Image
     */
    public $photo;

    function __construct($attributes = [])
    {
        if(isset($attributes['photo'])){
            $this->photo = $attributes['photo'];
            unset($attributes['photo']);
        }
        parent::__construct($attributes); // Eloquent

    }

    /**
     *
     *
     * @return MorphTo
     */
    public function imageable()
    {
        return $this->morphTo();
    }

    /**
     * Put the file into the FileSystem
     *
     * @return mixed
     */
    public function put()
    {
        if(!isset($this->photo))
            throw new \Exception('No file has passed to constructor.');
        $storePaths = $this->photo->put();
        $this->untouched = $storePaths['untouched'];
        $this->medium = $storePaths['medium'];
        $this->thumb = $storePaths['thumb'];
    }

    /**
     * Get the full sized image url
     *
     * @return mixed
     */
    public function get()
    {
        return $this->untouched;
    }

    /**
     * Get the full sized image url
     *
     * @return mixed
     */
    public function getUntouched()
    {
        return $this->untouched;
    }

    /**
     * Get the medium sized image url
     *
     * @return mixed
     */
    public function getMedium()
    {
        return $this->medium;
    }

    /**
     * Get the thumb sized image url
     *
     * @return mixed
     */
    public function getThumb()
    {
        return $this->thumb;
    }

}
