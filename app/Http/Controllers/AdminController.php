<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Auth;
// use Session;



class AdminController extends Controller
{
    public function registration()
    {
        return view( 'auth\registeration');
    }

    public function create(array $data)
    {
      return Admin::create([
        'username' => $data['username'],
        'pass' => Hash::make($data['pass'])
      ]);
    }    
      
    public function customRegistration(Request $request)
    {  
        $request->validate([
            
            'username' => 'required',
            'pass' => 'required|min:8',
            'confirm_password' => 'required|same:pass'
        ],
        [
            'username.required' => 'Username Required.',
            'pass.required' => 'Password must be atleast 8 characters.',
            'confirm_password' => 'Password does not match, try again.' 
        ]);

        $username = Admin::where('username', $request->username)->exists();
        if($username)
        {
          // echo("<script>alert('Username already exists')</script>");
          return redirect()->to('registration')->with('username' , 'Username Invalid or Already Taken');
        }
          
        else{
          $data = $request->all();
          $check = $this->create($data);
          
          return redirect()->to('login')->withSuccess('Registered Successfully');
          // return redirect("dashboard")->withSuccess('You have signed-in');
        }
    }

    public function login()
    {
        return view('auth\login');
    } 

    public function customLogin(Request $request)
    {
        $request->validate([

          'username' => 'required',
          'pass' => 'required',

        ]);

        $credentails = $request->only('username','pass');

        // return dd($credentails);

        if(Auth::attempt($credentails))
        {
          return redirect()->intended()('master')->withSuccess('Signed In');
          
        }
        else
        {
          return redirect('login')->withError('Invalid username or password.');
        }


    } 


    public function signOut() {
      Session::flush();
      Auth::logout();

      return Redirect('login');
  }
}
