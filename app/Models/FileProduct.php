<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileProduct extends Model
{
    use HasFactory;

    protected $fillable = ['file_id', 'product_id'];
}
