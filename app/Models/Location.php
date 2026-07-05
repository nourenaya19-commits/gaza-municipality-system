<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = ['store_id', 'aisle_number', 'rack_number', 'bin_number', 'capacity'];

    public function store() {
        return $this->belongsTo(Store::class);
    }

    public function transactions() {
        return $this->hasMany(Transaction::class);
    }
    public function stocks() 
{
    return $this->hasMany(ItemStockLocation::class);
}
}