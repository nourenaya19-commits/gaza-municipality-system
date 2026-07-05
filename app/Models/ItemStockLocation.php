<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemStockLocation extends Model
{
    use HasFactory;

    // تحديد اسم الجدول إذا كان مختلفاً عن الاسم التلقائي
    protected $table = 'item_stock_locations';

    // الحقول المسموح بتعبئتها
    protected $fillable = [
        'item_id',
        'store_id',
        'location_id',
        'current_stock'
    ];

    /**
     * علاقة المادة (الصنف)
     */
    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    /**
     * علاقة المخزن
     */
    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    /**
     * علاقة الموقع التخزيني (الرف/الممر)
     */
    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}