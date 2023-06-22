<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class ActivityArea extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    public $table = 'activity_area';

    protected $fillable = ['name'];
}
