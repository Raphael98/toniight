<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
