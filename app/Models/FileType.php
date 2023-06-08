<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileType extends Model
{
    use HasFactory;
    public $table       = 'file_type';
    protected $fillable = ['file_id', 'type', 'PDF', 'cover_image', 'slide_image'];
}
