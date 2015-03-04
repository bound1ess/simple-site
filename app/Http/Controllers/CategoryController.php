<?php namespace Frostbite\Http\Controllers;

class CategoryController extends Controller {

    /**
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        echo $id;
    }
}
