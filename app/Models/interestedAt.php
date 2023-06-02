<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InterestedAt extends Model
{
    use HasFactory;

    protected $table = 'interested_at';

    protected $fillable = [
        'product_id',
        'user_id'
    ];
}
