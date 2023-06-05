<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;
use APP\Models\Users;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('backend.pages.forms.registration');
    }
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required',
            // Add validation rules for other fields
        ]);
     
        // Create a new user instance
        $data['name'] =  $request->name;
        $data['email'] =  $request->email;
        $data['password'] = Hash::make($request->password);
        $user = user::create($data);
        if(!$user){
            return response()->json(['message' => 'Erorr']);
        }
        // Return a response
        return response()->json(['message' => 'User created successfully']);
    }


}