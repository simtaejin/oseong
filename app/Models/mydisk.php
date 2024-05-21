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
        'acquisition_method',
        'acquisition_date'
    ];

    public function gaoledisks()
    {
        return $this->hasOne(gaoledisk::class, 'id', 'gaoledisk_id');
    }

    public function gaolestore()
    {
        return $this->hasOne(gaolestore::class, 'id', 'gaolestore_id');
    }

}
