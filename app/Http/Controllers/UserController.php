<?php namespace Frostbite\Http\Controllers;

class UserController extends Controller {

    /**
     * @return Response
     */
    public function show()
    {
        return view('login');
    }
}
