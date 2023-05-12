<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usersToken extends Model
{
    use HasFactory;

    public $table = 'users_token';

    protected $fillable = ['user_id', 'token_id'];
    
}
