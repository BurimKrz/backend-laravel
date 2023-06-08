<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileHasType extends Model
{
    use HasFactory;
    public $table       = 'file_has_types';
    protected $fillable = ['file_id', 'type_id'];
}
