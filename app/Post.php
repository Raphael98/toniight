<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Post extends Model {

    protected $fillable = ["title", "date", "rua", "bairro", "num", "desc"];

    protected $guarded = ["id"];

    public function user(){
      return $this->belongsTo("App\User");
    }
}
