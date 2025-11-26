<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginPage()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('error', 'User not found');
        }

        if (!Auth::attempt($validated)) {
            return back()->with('error', 'Password not correct');
        }

        return redirect('/admins')->with('success', 'Successfully logged in');
    }



    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Logged out successfully.');
    }

    // public function registerPage()
    // {
    //     return view('auth.register');
    // }
    // public function register(Request $request)
    // {
    //     $request->validate([
    //         'fullname' => 'required|string|max:255',
    //         'email' => 'required|string|max:255|email'
    //     ]);

    //     if ($request->agree == 'on') {
    //         $agree = true;
    //     } else {
    //         $agree = false;
    //     }
    //     User::create([
    //         'fullname' => $request->fullname,
    //         'email' => $request->email,
    //         'username' => $request->username,
    //         'phone_number' => $request->phone_number,
    //         'gender' => $request->gender,
    //         'agreed_to_terms' => $agree,
    //         'password' => Hash::make($request->password),
    //     ]);

    //     return redirect('/login')->with(['message' => "success on register"]);
    // }
}
