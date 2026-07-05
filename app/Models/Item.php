<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute; // ضروري للـ Mutators الحديثة

class Item extends Model
{
    protected $fillable = [
        'name', 'price', 'quantity', 'store_id', 'category_id', 'unit_id', 'image'
    ];

    // الـ Attribute Casting
    protected $casts = [
        'price' => 'decimal:2',
        'quantity' => 'integer',
        'created_at' => 'datetime:Y-m-d',
    ];

    /**
     * Mutator & Accessor لاسم المادة (تنظيف وتنسيق الاسم)
     */
    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => ucwords($value),
            set: fn (string $value) => trim($value),
        );
    }

    /**
     * Accessor مخصص للسعر ليظهر مع العملة تلقائياً
     */
    public function getPriceWithCurrencyAttribute()
    {
        return $this->price . ' شيكل';
    }

    /**
     * العلاقات (Relations)
     */
    
    // علاقة المادة بالمخزن (الأب)
    public function store() 
    { 
        return $this->belongsTo(Store::class); 
    }

    // علاقة المادة بالتصنيف
    public function category() 
    { 
        return $this->belongsTo(Category::class); 
    }

    // علاقة المادة بالوحدة
    public function unit() 
    { 
        return $this->belongsTo(Unit::class); 
    }
}