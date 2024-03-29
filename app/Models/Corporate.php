<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Corporate extends Model
{
    use HasFactory;

    protected $table = 'corporate';

    protected $fillable = [
        'short_history',
        'mission',
        'vision',
        'responsibility',
        'export_stories',
        'human_resources',
        'bank_accounts',
        'our_bands',
        'company_id',
    ];
}
