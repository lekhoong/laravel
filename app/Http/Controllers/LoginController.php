<?php

namespace App\Http\Controllers;

use App\Models\logins;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;


class LoginController extends Controller
{
    public function login(){
        return view ("login");
    }
    public function layout(){
        return view ("layout");
    }

    public function authenticate(Request $request){
        $formFields=$request->validate([
            'email'=>['required','email'],
            'password'=>'required'
        ]);
        
        $user = logins::where('email',$formFields['email'])->first();

        if($user && Hash::check($formFields['password'],$user->password)){
            $request->session()->regenerate();

            return redirect("/layout")->with('message','login success');
        }

        return back()->withErrors(['email'=>'Invalid Credentials'])->onlyInput("email");
    }

    public function create(){
        return view ("register");
    }

    public function store(Request $request){
       
        $formFields=$request->validate([

            'email'=>['required','email',Rule::unique('logins','email')],
            'password'=>'required|confirmed|min:6'
        ]); 

        //hashpassword
        $formFields['password']=bcrypt($formFields['password']);
        //OTP
        $formFields['otp']=rand(1000,9999);
        //mail
        $user=logins::create($formFields);
        Mail::to($user->email)->send(new WelcomeMail($user));
        auth()->login($user);
        return redirect()->route("verify.show",[$user->id]);

    }

    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect("/")->with('message',"you have been loggend out");
    }

    public function show(logins $logins){
        return view("verify",[
            'logins' => $logins
        ]);
    }

    public function verify(Request $request,logins $logins){
        if($request->otp == $logins->otp){
            $logins["status"]="positif";
            $logins->update();
            return redirect("/layout")->with('message','email verified');
        }
    }

}
