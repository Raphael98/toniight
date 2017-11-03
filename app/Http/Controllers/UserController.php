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

    public function store(Request $request, User $user){

        $this->validate($request, $this->user->rules);
        $input = $request->all();
        $input["password"] = bcrypt($input["password"]);
        $input["nome"] = $user->initialsToUpper($input["nome"]);
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
      $posts = Auth::user()->posts;
      return view("user.profile", ["user" => Auth::user(), "posts" => $posts]);
    }

    public function update($field, Request $request){
      $user = Auth::user();
      switch($field){
        case "nome":
          $user->nome = $request->input("nome");
          break;
        case "email":
          $user->email = $request->input("email");
          break;
        case "password":
          if(\Hash::check($request->input("old"), $user->password)){
            $user->password = bcrypt($request->input("password"));
          }else{
            return redirect()->back()->with("warning", "A sua senha atual não confere");
          }
          break;
      }
      $user->save();
      return redirect()->back()->with("success", "Seus dados foram alterados com sucesso");
    }

    public function settings(){
      return view("user.settings",["user" => Auth::user()]);
    }
}
