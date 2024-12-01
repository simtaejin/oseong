<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mystore extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'gaolestore_id',
    ];
}
