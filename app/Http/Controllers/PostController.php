<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller {

    public function publish(Request $request){
        $rules = ["title" => "required|min:3",
                "rua" => "required|min:3",
                "num" => "required"];
        $this->validate($request, $rules);
        $inputs = $request->all();
        //If the date is equals to "__/__/____", return null
        $inputs["date"] = (toMysqlDateFormat($inputs["date"])) ? toMysqlDateFormat($inputs["date"]) : null;
        $post = new Post($inputs);
        $request->user()->posts()->save($post);
        return redirect()->back();
    }

    public function delete($id) {
      $post = Post::find($id);
      $post->delete();
      return redirect()->back()->with("success", "Sua postagem foi deletada com sucesso");
    }

    public function update(){

    }
}
