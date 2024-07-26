<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fish extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'f_cost',
        'category',
        'description',
        'size',
        'caution_flg',
        'np_flg',
        'display',
    ];
}