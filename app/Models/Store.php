<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    // الحقول التي نسمح للمستخدم بإدخالها
    protected $fillable = [
        'name', 
        'address_location', 
        'manager_id', 
        'status'
    ];

    /**
     * علاقة المخزن بالمواقع (المخزن الواحد يحتوي على مواقع متعددة)
     */
    public function locations()
    {
        return $this->hasMany(Location::class);
    }

    /**
     * علاقة المخزن بالحركات (المخزن الواحد تمت عليه حركات متعددة)
     */
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
    public function items()
{
    return $this->hasMany(Item::class);
}
public function stocks() { return $this->hasMany(ItemStockLocation::class); }
}