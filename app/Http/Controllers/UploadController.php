<?php namespace Frostbite\Http\Controllers;

use Image, Request;
use Frostbite\Repos\UploadRepo;
use Frostbite\Validators\UploadValidator;

class UploadController extends Controller {

    /**
     * @var UploadRepo
     */
    protected $repo;

    /**
     * @var integer
     */
    protected $height = 500;

    /**
     * @var integer
     */
    protected $width = 500;

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
        if ( ! Request::hasFile('file')) {
            abort(400); // better code?
        }

        $file = Request::file('file');

        if ( ! $file->isValid() or ! (new UploadValidator)->validate(Request::only('file'))) {
            abort(400);
        }

        $baseDir = public_path() . '/uploads/';

        // pick a new name
        do {
            $newName = uniqid(true) . '.jpg';
        } while (file_exists($baseDir . $newName));

        // move the file
        $file->move($baseDir, $newName);

        $img = Image::make($baseDir . $newName);

        // resize it
        $img->resize($this->width, $this->height)->save();

        // save it
        $id = $this->repo->create($file->getClientOriginalName(), $newName);

        return response()->json([
            'id' => $id,
            'name' => $newName,
        ]);
    }
}
