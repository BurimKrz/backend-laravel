<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileHasProduct extends Model
{
    use HasFactory;
    public $table       = 'file_has_product';
    protected $fillable = ['file_id', 'product_id'];
}
