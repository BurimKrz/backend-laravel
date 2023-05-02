<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class import_item extends Model
{
    use HasFactory;

    public $table = 'import_item';
    
    protected $fillable = ['name','description', 'price', 'category'];
}
