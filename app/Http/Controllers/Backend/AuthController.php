<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Http\Requests\LoginAdminRequest;
use App\Http\Requests\UpdateAuthRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Controller;


class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public $data = [];

    public function index()
    {


        $this->data['title'] = 'Đăng nhập';

        return view('admin.auth.login', $this->data);
    }

    public function login(LoginAdminRequest $request)
    {



        $check = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),

        ];

        if (Auth::attempt($check)) {


            return redirect()->route('dashboard')->with('success', 'Đăng nhập thành công');
        }

        return redirect()->route('auth.index')->with('error', "Sai tài khoản hoặc mật khẩu")->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auth.index')->with('success', "Đăng xuất thành công");
    }
}
