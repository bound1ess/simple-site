<?php namespace Frostbite\Http\Controllers;

use Auth, Request;
use Frostbite\Validators\UserValidator;

class UserController extends Controller {

    /**
     * @return Response
     */
    public function form()
    {
        return view('login');
    }

    /**
     * @return Response
     */
    public function auth()
    {
        if (Auth::attempt(Request::only('email', 'password'), true)) {
            return redirect()->intended('admin/dashboard');
        } else {
            return redirect()->back()->withInput()
                ->with('error_message', trans('errors.login'));
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
        return view('admin.main');
    }

    /**
     * @return Response
     */
    public function profile()
    {
        return view('admin.profile');
    }

    /**
     * @return Response
     */
    public function saveProfile()
    {
        echo 'Hello, world!';
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
