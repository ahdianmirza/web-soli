<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);
        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($infologin)) {
            if (Auth::user()->id_role == "Admin") {
                return redirect('/admin');
            } elseif (Auth::user()->id_role == "User") {
                return redirect('/peminjamanUser');
            } elseif (Auth::user()->id_role == "Superadmin") {
                return redirect('/superadmin');
            }
        } else {
            return redirect('/login')->withErrors([
                'email' => 'Email atau password Anda salah',
            ])->withInput();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
