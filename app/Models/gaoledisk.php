<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gaoledisk extends Model
{
    use HasFactory;

    protected $fillable = [
        'tan',
        'seong',
        'diskNumber',
        'diskName',
        'diskImage'
    ];

}
