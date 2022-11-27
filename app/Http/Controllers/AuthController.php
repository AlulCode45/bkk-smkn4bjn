<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login()
    {
        return view('Auth/login');
    }
    public function register()
    {
        return view('Auth/register');
    }
    public function loginAction(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            if (Auth::user()->role == 5) {
                return redirect()->route('dinas');
            }elseif (Auth::user()->role == 4) {
                return redirect()->route('master');
            } elseif (Auth::user()->role == 3) {
                return redirect()->route('operator');
            } elseif (Auth::user()->role == 2) {
                return redirect()->route('perusahaan');
            } elseif (Auth::user()->role == 1) {
                return redirect()->route('home');
            } else {
                return redirect()->back()->with('errorLogin', 'email / password salah');
            }
        } else {
            return redirect()->back()->with('errorLogin', 'email / password salah');
        }
    }
    function registerAction(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'account_role' => 'required|integer|between:1,2'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $save = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->account_role,
        ];
        if (User::insert($save)) {
            return redirect()->back()->with('success', 'Pendaftaran sukses silahkan login !');
        } else {
            return redirect()->back()->with('error', 'Pendaftaran gagal silahkan daftar ulang !');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('home')->with('successLogout', 'Berhasil logout');
    }
}
