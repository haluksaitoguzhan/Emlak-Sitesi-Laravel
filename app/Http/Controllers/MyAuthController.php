<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class MyAuthController extends Controller
{
    public function register(){
        return view('front.mypage');
    }

    public function registerPost(Request $request){
        
        $request->validate([
            'name' => ['required', 'string', 'min:2'],
            'surname' => ['required', 'string', 'min:2'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6'],
        ],[
            'name.min' =>'İsim en az 2 karakter olmalıdır!',
            'surname.min' =>'Soyisim en az 2 karakter olmalıdır!',
            'email.unique' =>'Böyle bir kullanıcı zaten var!',
            'password.required' =>'Şifre girmelisiniz!',
            'password.min' =>'Şifre en az 6 karakterden oluşmalıdır!',
        ]);

        if($request->password == $request->cpassword){
            $user = new User;
            $user->name = $request->name;
            $user->surname = $request->surname;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->route('my_login');
        }else{
            return redirect()->route('my_register')->withErrors('Şifreler uyumlu değil!');
        }        
    }

    public function login(){
        return view('front.login');
    }

    public function loginPost(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ],[
            'email.required' =>'Email girmelisiniz!',
            'password.required' =>'Şifre girmelisiniz!'
        ]
        );

        //return $request;
        
        $check = $request-> only(['email' , 'password']);
        if(Auth::guard('myuser')->attempt($check)){
            //return Auth::guard('admin')->user();
            return redirect()->route('homepage')->with('admin',Auth::guard('myuser')->user());
        }else{
            return redirect()->route('my_login')->withErrors('Email adresi veya şifre hatalı!');
        }
    }

    public function logout(){
        //return response('sg');
        Auth::guard('myuser')->logout();
        return redirect()->route('homee');
    }
}
