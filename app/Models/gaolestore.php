<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gaolestore extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'addr',
        'units',
        'xlang',
        'ylang'
    ];
}
