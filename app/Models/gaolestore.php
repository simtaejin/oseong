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

    public function format()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'addr' => $this->addr,
            'units' => $this->units,
            'xlang' => $this->xlang,
            'ylang' => $this->ylang,
        ];
    }

}
