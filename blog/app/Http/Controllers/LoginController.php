<?php

namespace App\Http\Controllers;
use App\Models\user;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Hash;

class LoginController extends Controller
{
    public function register(){
        return view('login.signup');
    }
    public function check(Request $request){
        $credentials = $request->validate( [
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        $userInfo = user::where('email', '=' , $request->email)->first();
        if(!$userInfo){
            return back()->with('fail', 'we do not recognize your email address !');
        }else{
            if(Hash::check($request->password, $userInfo->password)){
                $request->session()->put('LoggedUser', $userInfo->id);
                return redirect('dashboard');
            }else{
                return back()->with('fail', 'incorrect password');
            }
        }


    }
   
}
