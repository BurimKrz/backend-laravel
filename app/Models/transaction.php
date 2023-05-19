<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    use HasFactory;

    protected $table = 'transaction';

    protected $fillable = ['id', 'buyer_id', 'seller_id', 'product_id'];
}
