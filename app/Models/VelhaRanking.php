<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VelhaRanking extends Model
{
    use HasFactory;
    public $fillable = [
        'playerName',
        'points'
    ];
}
