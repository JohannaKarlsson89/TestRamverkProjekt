<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $fillable = [
        'category-name',
        'category-description'
    ];
    public function item() {
        return $this->hasMany(Item::class);
    }

}
