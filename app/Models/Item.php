<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
protected $fillable = [
    'name', 'price', 'quantity', 'category_id', 'unit_id', 'store_id'
];
    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function unit() {
        return $this->belongsTo(Unit::class);
    }

    public function stocks() { return $this->hasMany(ItemStockLocation::class); }
    // المادة الواحدة لها حركات متعددة
    public function transactions() {
        return $this->hasMany(Transaction::class);
    }
    public function store()
{
    return $this->belongsTo(Store::class);
}

}