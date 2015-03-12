<?php namespace Frostbite\Http\Controllers;

use Request;

class AdminController extends Controller {

    /**
     * @return Response
     */
    public function main()
    {
        return view('admin.main');
    }

    /**
     * @return Response
     */
    public function saveMain()
    {
        $input = Request::only('name', 'desc');

        dd($input);
    }

    /**
     * @return Response
     */
    public function posts()
    {
        return view('admin.posts');
    }

    /**
     * @return Response
     */
    public function categories()
    {
        return view('admin.categories');
    }
}
