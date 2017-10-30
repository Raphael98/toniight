<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Post;

class User extends Authenticatable {
    use Notifiable;

    protected $fillable = [
        'nome', 'email', 'password'
    ];

    public $rules = [
        "nome" => "required|min:3",
        "password" => "required|min:5",
        "email" => "required|min:5|unique:users",
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $guarded = ["id", "admin", "active"];

    public function posts(){
      return $this->hasMany("App\Post");
    }
}
