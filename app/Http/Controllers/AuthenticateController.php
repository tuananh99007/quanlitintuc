<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateController extends Controller
{
    public function login()
    {
        return view('admin.authenticate.login');
    }

    public function postlogin(Request $request)
    {
        $email = $request->input('email', null);
        $password = $request->input('password', null);
        $this->validateLogin($request);
        $credentials = [
            'email' => $email,
            'password' => $password,
            'is_deleted' => 0
        ];
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.users.list');
        }
        return redirect()->route('admin.authenticate.login');
    }

    private function validateLogin($request)
    {
        $request->validate([
            'email' => 'required|min:1|max:255',
            'password' => 'required|min:1|max:255',
        ]);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.authenticate.login');
    }
}
