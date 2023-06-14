<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuccessStories extends Model
{
    use HasFactory;

    protected $table = 'success_stories';

    protected $fillable = ['company_id', 'topic', 'representative', 'position', 'message', 'image_URL'];
}
