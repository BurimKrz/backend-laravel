<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class buySell extends Model
{
    use HasFactory;
    public $table = 'buy_sell';

    protected $fillable = ['user_id', 'product_id', 'action'];
}
