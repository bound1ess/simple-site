<?php namespace Frostbite\Http\Controllers;

use Image, Request;
use Frostbite\Repos\UploadRepo;

class UploadController extends Controller {

    /**
     * @var UploadRepo
     */
    protected $repo;

    /**
     * @param UploadRepo $repo
     * @return UploadController
     */
    public function __construct(UploadRepo $repo)
    {
        $this->repo = $repo;
    }

    /**
     * @return Response
     */
    public function index()
    {
        return view('upload.index')->withUploads($this->repo->all());
    }

    /**
     * @return string
     */
    public function save()
    {
        return 'OK';
    }
}
