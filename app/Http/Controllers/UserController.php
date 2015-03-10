<?php namespace Frostbite\Http\Controllers;

use Auth, Request;

class UserController extends Controller {

    /**
     * @return Response
     */
    public function show()
    {
        if (Auth::check()) {
            return redirect()->to('admin/dashboard');
        }

        return view('login');
    }

    /**
     * @return Response
     */
    public function auth()
    {
        if (Auth::attempt(Request::only('email', 'password'), true)) {
            return redirect()->to('admin/dashboard');
        } else {
            return redirect()->to('admin/login')->withStatus(false);
        }
    }

    /**
     * @return Response
     */
    public function logout()
    {
        Auth::logout();

        return redirect()->to('/');
    }

    /**
     * @return Response
     */
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    /**
     * @return Response
     */
    public function profile()
    {
        return view('admin.profile');
    }
}
