<?php namespace Frostbite\Http\Controllers;

use Image, Request;
use Frostbite\Repos\UploadRepo;

class UploadController extends Controller {

    /**
     * @var UploadRepo
     */
    protected $repo;

    /**
     * @var integer
     */
    protected $height = 480;

    /**
     * @var integer
     */
    protected $width = 640;

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

        if ( ! $file->isValid()) {
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
        list ($height, $width) = $this->resize($img->height(), $img->width());
        $img->resize($height, $width);

        // save it
        $id = $this->repo->create($file->getClientOriginalName(), $newName);

        return response()->json([
            'id' => $id,
            'name' => $newName,
        ]);
    }

    /**
     * This code shouldn't be here, but whatever.
     *
     * @param integer $height
     * @param integer $width
     * @return array
     */
    protected function resize($height, $width)
    {
        while ($height > $this->height || $width > $this->width) {
            // maintain ratio
            $height /= 2;
            $width /= 2;
        }

        return [$height, $width];
    }
}
