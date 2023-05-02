<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    public $table = 'product';

    protected $fillable = ['name', 'decription', 'price', 'imageURL', 'views', 'category_id', 'copmapy_id', 'created_at'];
}
