<?php

namespace App\Http\Controllers;
use App\Models\category;
use App\Models\message;
use App\Models\blogpost;
use Illuminate\Http\Request;

class HomeGetController extends Controller
{
   public function home(){
      $blogs = blogpost::get();
      $category = category::get();

      return view('front.home', compact('blogs', 'category'));
   }
   public function about(){
    return view("front.layouts.about");
   }
   public function contact(){
    return view("front.layouts.contact");
   }
   public function post(){
      return view("front.layouts.post");
     }
   public function storeMessage(Request $request){
      $validatedData = $request->validate([
         'title' => 'required|string',
         'email' => 'required',
         'message' => 'required',
         // Add validation rules for other fields
     ]);
  
     // Create a new user instance
     $data['title'] =  $request->title;
     $data['email'] =  $request->email;
     $data['message'] =  $request->message;
     $message = message::create($data);
     if(!$message){
         return response()->json(['message' => 'Erorr']);
     }
     // Return a response
     return response()->json(['message' => 'Message sent successfully']);
   }
   public function showPost($id){
      $postdata  = blogpost::where('id', '=', $id)->first();
      return view('front.layouts.post', compact('postdata'));
   }
}
