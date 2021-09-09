<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function store(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password,])){
            return redirect()->route('admin.users.index');
        }else{
            return redirect()->route('/login');
        }
    }
    //
    // public function index(){
    //     return view('login');
    // }
    // public function validator($data)
    // {
    //     return validator::make($data, [
    //         'email' => 'required|email|max:255',
    //         'password' => 'required|min:0',
    //     ]);
    // }
    // public function login(Request $request){
    //     if($request->isMethod('post')){
    //         $email =$request->input("email");
    //         $password = $request->input("password");
    //         $validator = $this->validator($request->all());
    //         if($validator->fails()){
    //             return Redirect::to('login')->withInput()->whitErrors($validator);
    //         }
    //         if (Auth::attempt(['email'=> $email,'password' => $password, 'role' => 1])){
    //             return Redirect::to('/invoice/add');
    //         }else{
    //             return Redirect::to('/login')->withInput()->whitErrors("Email hoac mat khau khong chinh xac!");
    //         }
    //         return back()->withInput();
    //     }
    //     return view('login');
    // }
    // public function logout(){

    // }
}
