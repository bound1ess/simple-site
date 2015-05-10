<?php namespace Frostbite\Repos;

use Frostbite\Upload;

class UploadRepo {

    /**
     * @var Upload
     */
    protected $upload;

    /**
     * @param Upload $upload
     * @return UploadRepo
     */
    public function __construct(Upload $upload)
    {
        $this->upload = $upload;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function all()
    {
        return $this->upload->whereVisible(true)->get()->reverse();
    }

    /**
     * @param string $name
     * @param string $path
     * @return integer
     */
    public function create($name, $path)
    {
        $upload = $this->upload;

        $upload->name = $name;
        $upload->path = $path;

        $upload->save();

        return $upload->id;
    }
}
