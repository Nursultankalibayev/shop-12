<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function main()
    {
        if (!Auth::check()){
            return redirect()->route('login');
        }
        return view('admin.main');
    }

    public function getLogin()
    {
        if (!Auth::check())
            return view('admin.auth.login');
        else
            return redirect('/');
    }

    public function postLogin(Request $request)
    {
        $userData = array(
            'email' => $request->email,
            'password' =>$request->password
        );
        if (!Auth::attempt($userData)) {
            $error = 'Неправильный логин или пароль';
            return  view('admin.auth.login', [
                'login' => $request->email,
                'error' => $error
            ]);
        }
         return redirect()->route('dashboard');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
