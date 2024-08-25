<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FutIcon extends Model
{
    use HasFactory;

    protected $table = 'fut_icon';

    // If you have specific fields that are fillable
    protected $fillable = [
        'avatarUrl',
        'commonName',
        'overallRating',
        'position',
        'PAC',
        'SHO',
        'PAS',
        'DRI',
        'DEF',
        'PHY',
        'nationalityImage'
    ];

}
