<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['item_id', 'user_id', 'store_id', 'location_id', 'quantity', 'type'];

    public function item() {
        return $this->belongsTo(Item::class);
    }

    public function store() {
        return $this->belongsTo(Store::class);
    }

    public function location() {
        return $this->belongsTo(Location::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}