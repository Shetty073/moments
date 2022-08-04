<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function signin(Request $request)
    {
        $request->flashExcept('password');

        $credentials = $request->only('email', 'password');

        $remember = false;

        if ($request->has('remember')) {
            $remember = true;
        }

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function signout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('signin.index');
    }

    public function changeMyPassword(Request $request, $id)
    {
        $this->validate($request, [
            'current_password' => 'required|current_password',
            'password' => 'required|confirmed',
        ]);

        $user = User::findorfail($id);
        $user->setPasswordAttribute($request->input('password'));
        $user->save();

        return back()->with('success', 'You have successfully changed your password.');
    }
}
