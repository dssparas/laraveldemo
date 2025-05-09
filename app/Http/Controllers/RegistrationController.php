<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer;

class RegistrationController extends Controller
{
    public function index() 
    {
        return view('form');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers,email',
            'password' => 'required|min:6',
        ]);

        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->dob = $request->dob;
        $customer->gender = $request->gender;
        $customer->address = $request->address;
        $customer->country = $request->country;
        $customer->state = $request->state;
        $customer->password = md5($request->password); // Consider using bcrypt instead
        $customer->save();

        return redirect('/home')->with('success', 'Registration successful!');
    }
}
