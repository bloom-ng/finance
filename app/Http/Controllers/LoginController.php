<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{  
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }
    
    public function login()
    {
        return view('auth.login');
    }

    public function loginUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('name',$request->name)->first();

        if ($user) {
            Hash::check($request->password, $user->password);
            return redirect()->route('dashboard');

        }else{
            session()->flash('message', 'Invalid credentials');
            return redirect()->back();
        }
    }
}