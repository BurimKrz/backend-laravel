<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class buyerConfirmation extends Model
{
    use HasFactory;

    protected $table = 'buyer_confirm';

    protected $fillable = ['id', 'user_id', 'product_id', 'confirmation'];
}
