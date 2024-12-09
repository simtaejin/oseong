<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class arrayTable extends Model
{
    use HasFactory;

    protected $fillable = [
        'tan',
        'rows',
        'line_1',
        'line_2',
        'line_3',
        'line_4',
        'line_5',
        'line_6',
        'line_7',
        'line_8',
    ];
}
