<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userCompany extends Model
{
    use HasFactory;

    protected $table = 'user_company';

    protected $fillable = ['id', 'user_id', 'company_id'];
}
