<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
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
    // Categoryモデルとのリレーションを開始
    public function category()
    {
        return $this->belongto(Category::class, 'category', 'category');
    }
}
