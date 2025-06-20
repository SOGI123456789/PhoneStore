<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

public function login(Request $request)
{
    $request->validate([
        'email'    => 'required|string',
        'password' => 'required|string',
    ]);

    // Chỉ kiểm tra bảng users theo email
    $user = User::where('email', $request->email)->first();

    // Đúng mật khẩu
    if ($user && Hash::check($request->password, $user->password_hash)) {
        Auth::login($user);

        // Chuyển hướng theo role_id
        switch ($user->role_id) {
            case 0:
                return redirect()->route('user.dashboard');
            case 1:
                return redirect()->route('moderator.dashboard');
            case 2:
                return redirect()->route('admin.dashboard');
            case 3:
                return redirect()->route('superadmin.dashboard');
            default:
                return redirect()->route('index');
        }
    }

    return back()->withErrors(['email' => 'Email hoặc mật khẩu không đúng!']);
}

    public function logout(Request $request)
    {
        Auth::logout();
        session()->forget('admin');
        return redirect()->route('login');
    }
}
