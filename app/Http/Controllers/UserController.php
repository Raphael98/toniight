<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\User;
use App\Post;

class UserController extends Controller{
    protected $user;

    public function __construct(User $user){
        $this->user = $user;
    }

    public function store(Request $request){
        $this->validate($request, $this->user->rules);
        $input = $request->all();
        $input["password"] = bcrypt($input["password"]);
        $user = User::create($input);
        Auth::login($user);
        return redirect()->route("user.profile");
    }

    public function login(Request $request){
        $this->validate($request, ["email" => "required|min:3",
                                    "password" => "required|min:5"]);
        if(Auth::attempt(["email" => $request->input("email"),
                        "password" => $request->input("password")])){
            return redirect()->route("user.profile");
        }else{
            return redirect()->back()->with("fail", "Nome ou senha incorreta");
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route("home");
    }

    public function profile(){
      $posts = Post::all();
      return view("user.profile", ["user" => Auth::user(), "posts" => $posts]);
    }
}
