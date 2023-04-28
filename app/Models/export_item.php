<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class export_item extends Model
{
    public $table = 'export_item';
    
    protected $fillable = ['name','description', 'price', 'category'];
}
