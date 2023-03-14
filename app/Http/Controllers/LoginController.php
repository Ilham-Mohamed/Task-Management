<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Session;
use Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index(){
        return view('login');
    }
    public function logIn(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
 
        $user = $request->only('email', 'password');
        if($user){
            if(Auth::attempt($user)){
                return redirect()->intended('index')
                            ->with('message', 'Login Successfully');
            }
        }
        return redirect('/login')->with('message', 'Login details are not valid!');
    }

    public function signout(){
        Session::flush();
        Auth::logout();

        return redirect('/');
    }
    // public function signup(){
    //     return view('register');
    // }

    // public function registration(Request $request)
    // {
    //     $request->validate([
    //         'name'=>'required',
    //         'email'=>'required|email|unique:users',
    //         'password'=>'required|min:5|max:12'
    //     ]);

    //     $data = $request->all();
    //     $check = $this->create($data);

    //     return redirect('index');
    // }
    // public function create(array $data){
    //     return User::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'password' => Hash::make($data['password']),
    //     ]);
    // }
}
