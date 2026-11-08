<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController {
 public function login(){return view('auth.login');}
 public function register(){return view('auth.register');}
 public function authenticate(Request $request){
  $credentials=$request->validate(['email'=>'required|email','password'=>'required']);
  if(!Auth::attempt($credentials)) return back()->withErrors(['email'=>'Email atau kata sandi salah.'])->onlyInput('email');
  $request->session()->regenerate(); return redirect()->intended(route('dashboard'));
 }
 public function store(Request $request){
  $data=$request->validate(['name'=>'required|string|max:120','username'=>'required|alpha_dash|max:60|unique:users','email'=>'required|email|unique:users','password'=>'required|min:8|confirmed']);
  $user=User::create($data);Auth::login($user);$request->session()->regenerate();return redirect()->route('dashboard');
 }
 public function logout(Request $request){Auth::logout();$request->session()->invalidate();$request->session()->regenerateToken();return redirect()->route('login');}
}
