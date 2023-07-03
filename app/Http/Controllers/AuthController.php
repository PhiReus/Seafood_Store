<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;



class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('products.index');
        } else {
            return view('admin.layouts.blank');
        }
    }

    public function postLogin(Request $request)
    {
        // dd(1);
        $messages = [
            "email.exists" => "Email không đúng",
            "password.exists" => "Mật khẩu không đúng",
        ];
        $validator = Validator::make($request->all(), [
            'email' => 'exists:users,email',
            'password' => 'exists:users,password',
        ], $messages);
        $data = $request->only('email', 'password');
        if (Auth::attempt($data)) {
            alert()->success('Đăng nhập thành công!');
            return redirect()->route('products.index');
        } else {
            // dd(1);
            return back()->withErrors($validator)->withInput();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function forgot_password()
    {

        return view('admin.Auth.forgot_password');
    }

    public function post_forgot_password(Request $request)
    {
        $user = User::where('email', $request->email)->first(); // Tìm người dùng dựa trên địa chỉ email yêu cầu

        if ($user) {
            $pass = Str::random(6);
            $user->password = bcrypt($pass);
            $user->save();

            $data = [
                'name' => $user->name,
                'pass' => $pass,
                'email' => $user->email,
            ];

            Mail::send('admin.Auth.password', compact('data'), function ($email) use ($user) {
                $email->from($user->email, $user->name); // Địa chỉ email và tên người gửi là email của người dùng
                $email->subject('PHIREUS SEAFOOD');
                $email->to($user->email, $user->name);
            });
        }
        return redirect()->route('login');
    }
}
