<?php
 
namespace App\Http\Controllers;
 
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
 
class AuthController extends Controller
{
    public function register():View
    {
        return view('auuth.register');
    }
 
    public function registerPost(Request $request)
    {
        $user = new Users();
 
        $user->name = $request->name;
        $user->email = $request->email;
        $user->email_verified_at = $request->email_verified_at;
        $user->password = Hash::make($request->password);
 
        $user->save();
 
        return back()->with('success', 'Register successfully');
    }
 
    public function login()
    {
        return view('home.login');
    }
 
    public function loginPost(Request $request)
    {
        $credetials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
 
        if (Auth::attempt($credetials)) {
            return redirect('/home.home')->with('success', 'Login Success');
        }
 
        return back()->with('error', 'Error Email or Password');
    }
 
    public function logout()
    {
        Auth::logout();
 
        return redirect()->route('login');
    }
}