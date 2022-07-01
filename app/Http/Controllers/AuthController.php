<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{  
    
    public function login()
    {
        return view('auth.login');
    }

    public function loginUser(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $authenticatedUser = User::find(Auth::id());
            if ($authenticatedUser->isAdmin()) {
                return redirect()->intended(route('admin.dashboard'));
            }
            if ($authenticatedUser->isSecretary()) {
                return redirect()->intended('secretary.dashboard');
            }
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}