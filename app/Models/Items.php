<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    use HasFactory;
    protected $fillable = [
        'item-name',
        'item-price',
        'item-description',
        'category-id',
        'item-count',
        'item-picture'
    ];
    public function category() {
        return $this->belongsTo(Category::class);
    }
}
