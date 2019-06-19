<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    public function index()
    {
        return view('AdminPanel.index');
    }
    public function login()
    {
        return view('AdminPanel.login');

    }
    public function make_login(Request $request)
    {
        // return $request->input('remember') === 1? true:false ;
        //echo $remember = $request->input('remember') === '1' ? true : false;
        $remember =  $request->remember == 1 ? true:false;
       // echo $remember;
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            // Authentication passed...
         
           return redirect('/');
        }
        else {
            
            session()->flash('error','error email or password');
            return redirect()->back();
        }

    }
    public function logout()
{
    auth()->guard('admin')->logout();
    return redirect('/login');
    
}
}
