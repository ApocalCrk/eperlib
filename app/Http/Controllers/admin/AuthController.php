<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index() {
        if(Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('auth.login_admin');
    }

    public function login(Request $request) {
        $checkAdmin = Admin::where('username', $request->username)->first();
        if($checkAdmin){
            if(Hash::check($request->password, $checkAdmin->password)) {
                Auth::guard('admin')->login($checkAdmin);
                return redirect()->route('admin.dashboard');
            }else{
                return redirect()->back()->with('error', 'Username atau Password salah!');
            }
        } else {
            return redirect()->back()->with('error', 'Username atau Password salah!');
        }
    }

    public function logout() {
        Auth::guard('admin')->logout();
        return redirect()->route('login_admin');
    }
}
