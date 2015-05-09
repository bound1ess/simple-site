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
}
