<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
protected $fillable = ['name', 'price', 'category_id', 'unit_id'];

   
public function category() {
    return $this->belongsTo(Category::class);
}

public function unit() {
    return $this->belongsTo(Unit::class);
}
} 