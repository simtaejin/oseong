<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mydisk extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'gaoledisk_id',
        'gaolestore_id',
        'acquisition'
    ];

}
