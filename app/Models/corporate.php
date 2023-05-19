<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class corporate extends Model
{
    use HasFactory;

    protected $table = 'corporate';

    protected $fillable = [
        'short_history',
        'mission',
        'version',
        'responsibility',
        'export_stories',
        'human_resources',
        'bank_accounts',
        'our_bands',
        'company_id',
    ];
}
