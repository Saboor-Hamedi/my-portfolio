<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use ValidatesRequests;

    public function showLogin()
    {
        return view('login');
    }

    public function loginAction(Request  $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:3'
        ]);
        $redentials = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (Auth::attempt($redentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.index'));
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('index');
    }
}
