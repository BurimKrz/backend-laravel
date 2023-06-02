<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InterestedIn extends Model
{
    use HasFactory;

    public $table = 'interested_in';

    protected $fillable = ['product_id', 'buyer_id', 'company_id'];
}
