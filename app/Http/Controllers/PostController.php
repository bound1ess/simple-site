<?php namespace Frostbite\Http\Controllers;

class PostController extends Controller {

    /**
     * @param integer $id
     *
     * @return Response
     */
    public function show($id)
    {
        echo $id;
    }
}
