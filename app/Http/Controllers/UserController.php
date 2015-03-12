<?php namespace Frostbite\Http\Controllers;

use Auth, Hash, Request;
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
    public function profile()
    {
        return view('admin.profile');
    }

    /**
     * @return Response
     */
    public function saveProfile()
    {
        $input = Request::only('email', 'old_password', 'new_password');

        if ( ! with(new UserValidator)->validate($input)) {
            return redirect()->back()->withInput()->withMessage(trans('errors.profile'));
        }

        $user = Auth::user();

        if ( ! Hash::check($input['old_password'], $user->password)) {
            return redirect()->back()->withInput()
                ->withMessage(trans('errors.pswd-mismatch'));
        }

        $user->email = $input['email'];

        if ($input['new_password']) {
            $user->password = Hash::make($input['new_password']);
        }

        $user->save();

        return redirect()->to('admin/dashboard');
    }
}
