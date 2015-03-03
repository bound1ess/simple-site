<?php namespace Frostbite\Http\Controllers;

class MainPageController extends Controller {

    /**
     * @return Response
     */
    public function index()
    {
        return view('main');
    }
}
