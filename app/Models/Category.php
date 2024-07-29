<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category', // FishTBLから取得したcategoryに紐づく
        'phylum', // FishTBLから取得されたcategoryに置換される文字列（名前）
    ];
}
