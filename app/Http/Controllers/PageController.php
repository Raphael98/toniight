<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PageController extends Controller {

    public function home(){
        return view("home");
    }

    public function signup(){
        return view("signup");
    }

    public function login(){
        return view("login");
    }

    //TODO: Implements report system
    public function search($key = ""){
      $posts = Post::all();
      return view("search")->with("posts", $posts);
    }


    public function searchKey(Request $request){
      $key = $request->input("keyword");
      $posts = Post::where("title", "like", "%".$key."%")->get();
      return view("search")->with("posts", $posts);
    }
}
