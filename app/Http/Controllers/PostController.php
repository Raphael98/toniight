<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

//TODO: Convert date type
class PostController extends Controller {

    public function publish(Request $request){
        $rules = ["title" => "required|min:3",
                "rua" => "required|min:3",
                "num" => "required"];
        $this->validate($request, $rules);
        $inputs = $request->all();
        $inputs["date"] = toMysqlDateFormat($input["date"]);
        $post = new Post($inputs);
        $request->user()->posts()->save($post);
        return redirect()->back();
    }
}
