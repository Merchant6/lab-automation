<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Auth;
// use Session;



class AdminController extends Controller
{
    public function registration()
    {
        return view('auth.registration');
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
            'confirm_password' => 'required|same:pass|min:8'
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
         
        return dd($data);
        // return redirect("dashboard")->withSuccess('You have signed-in');
    }
}
