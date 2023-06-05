<?php

namespace App\Http\Controllers;

use App\Models\blogpost;
use App\Models\category;
use App\Models\user;
use App\Models\message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Mail;

class dashboardController extends Controller
{
    public function dashboard(){
        $data=["LoggedUserInfo"=>user::where('id', '=', session('LoggedUser'))->first()];
        $countCategory=category::count();
        $countUsers=user::count();
        $countPosts=blogpost::count();
        return view('backend.dashboard', $data, compact('countCategory', 'countUsers', 'countPosts'));
    }
    public function login(){
        return view('Registration.signin');
    }
    public function message(){
        $data=["LoggedUserInfo"=>user::where('id', '=', session('LoggedUser'))->first()];
        $message = message::get();
        return view('backend.pages.forms.message', $data, compact('message'));
    }
    public function registration(){
        $data=["LoggedUserInfo"=>user::where('id', '=', session('LoggedUser'))->first()];
        $users = user::get();
        return view('backend.pages.forms.registration', $data, compact('users'));
    }
    public function general(){
        $data=["LoggedUserInfo"=>user::where('id', '=', session('LoggedUser'))->first()];
        $blogs = blogpost::get();
        $category = category::get();
        return view('backend.pages.forms.general', $data, compact('blogs', 'category'));
    }
    public function simple(){
        $data=["LoggedUserInfo"=>user::where('id', '=', session('LoggedUser'))->first()];
        return view('backend.pages.tables.simple', $data);
    }
    public function data(){
        $data=["LoggedUserInfo"=>user::where('id', '=', session('LoggedUser'))->first()];
        return view('backend.pages.tables.data', $data);
    }
    public function logout(){
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('login');
        }
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'login Authority' => 'required|string',
            'email' => 'required|email|unique:user',
            'password' => 'required',
        ]);
     
        $data['name'] =  $request->name;
        $data['log_authority'] =  $request->la;
        $data['email'] =  $request->email;
        $data['password'] = Hash::make($request->password);
        $user = user::create($data);
        if(!$user){
            return response()->json(['message' => 'Erorr']);
        }
        return redirect()->back()->with(['sMessage' => 'User created successfully']);
    }

    public function logins (Request $request){
        $credentials = $request->validate([
        'email'=> 'required',
        'password' => 'required'
        ]);

        if(\Auth::attempt($request->only('email', 'password'))) {
        return redirect ( 'dashboard');
        }
        return redirect('login')->withError('Login details are not valid');
    }
    public function storePost(Request $request){
        $validatedData = $request->validate([
            'title' => 'required|string',
            'content' => 'required',
            'author' => 'required',
            'category' => 'required',
        ]);
    
        $data['title'] =  $request->title;
        $data['author'] =  $request->author;
        $data['category'] =  $request->category;
        $data['content'] =  $request->content;
        $blog = blogpost::create($data);
        if(!$blog){
            return response()->json(['message' => 'Erorr']);
        }
        return redirect()->back()->with(['sMessage' => 'New Blog Published successfully']);
    }
    public function deletePost($id){
        blogpost::where('id', '=', $id)->delete();
        return redirect()->back()->with('sMessage',   'Post Deleted successfully');
    }
    public function editPost($id){
        $data=["LoggedUserInfo"=>user::where('id', '=', session('LoggedUser'))->first()];
        $postdata  = blogpost::where('id', '=', $id)->first();
        $category = category::get();
        return view('backend.pages.forms.editpost',$data, compact('postdata', 'category'));
    }
    public function updatePost(Request $request){
        $validatedData = $request->validate([
            'title' => 'required|string',
            'content' => 'required',
            'author' => 'required',
            'category' => 'required',
        ]);

        $id = $request->id;
        $title = $request->title;
        $author = $request->author;
        $category = $request->category;
        $content = $request->content;
        
        blogpost::where('id', '=', $id)->update([
            'title'=>$title,
            'author'=>$author,
            'category'=>$category,
            'content'=>$content,
        ]);
        return redirect()->back()->with('sMessage',   'Post Updated successfully');
    }
    public function addCategory(Request $request){
        $validatedData = $request->validate([
            'category' => 'required|string',
        ]);
     
        $data['category'] =  $request->category;
        $categories = category::create($data);
        if(!$categories){
            return response()->json(['message' => 'Erorr']);
        }
        return redirect()->back()->with('cMessage',   'Category Added successfully');
    }

    public  function sendMail(Request $request){
        $validatedData = $request->validate([
            'emailto' => 'required|email',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);
     
        $data['emailto'] =  $request->email;
        $data['subject'] =  $request->subject;
        $data['message'] =  $request->message;
        $email = $request->email;
        $array = [
            'name' => 'Hasamuddin',
            'Surname' => 'Afzali',
            'data' => date("Y-m-d")
        ];
        Mail::send('welcome', $array, function ($message) use ($email){
            $message->subject('Merhaba');
            $message->to($email);
        });
        return redirect()->back()->with(['sMessage' => 'User created successfully']);
    }
    public function deleteUser($id){
        user::where('id', '=', $id)->delete();
        return redirect()->back()->with('sMessage',   'Post Deleted successfully');
    }

    
}
