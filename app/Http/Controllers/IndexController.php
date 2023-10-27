<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SchoolRegister;
use Illuminate\Support\Facades\Hash;



class IndexController extends Controller
{
    public function index ()
    {
    	return view('project.index');
    }

    public function login(Request $request)
    {
        $request->validate([
            'uname' => 'required',
            'password' => 'required',
        ]);

        $user = SchoolRegister::where('uname', $request->input('uname'))->first();

        if ($user && Hash::check($request->input('password'), $user->password)) {
            // Authentication passed
            session(['user_id' => $user->id]);
            return redirect('/home');
        }

        // Authentication failed
        return redirect()->back()->withErrors(['uname' => 'Invalid credentials']);
    }


    public function logout ()
    {
        $user_id = session('user_id');
        Auth::logout();

        // Destroy user's session
        session()->flush();

        return redirect('/'); // Redirect to login page after logout
    }

   
   
}
