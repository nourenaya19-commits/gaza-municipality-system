<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Unit;
use App\Models\Category; 

class DatabaseSeeder extends Seeder
{
public function run(): void
{
    // 1. المخازن الرئيسية في البلدية
    \App\Models\Store::create(['name' => 'مخزن قطع الغيار']);
    \App\Models\Store::create(['name' => 'مخزن القرطاسية']);
    \App\Models\Store::create(['name' => 'مخزن الوقود والزيوت']);

    // 2. التصنيفات المطلوبة لبيئة البلدية
    \App\Models\Category::create(['name' => 'قطع غيار آليات']);
    \App\Models\Category::create(['name' => 'أدوات سباكة ومواسير']);
    \App\Models\Category::create(['name' => 'مواد بناء']);
    \App\Models\Category::create(['name' => 'قرطاسية وأحبار']);
    \App\Models\Category::create(['name' => 'كهرباء وإنارة']);

    // 3. الوحدات (مع وضع قيمة للـ symbol لتجنب الخطأ السابق)
    \App\Models\Unit::create(['name' => 'قطعة', 'symbol' => 'pc']);
    \App\Models\Unit::create(['name' => 'كرتونة', 'symbol' => 'box']);
    \App\Models\Unit::create(['name' => 'متر', 'symbol' => 'm']);
    \App\Models\Unit::create(['name' => 'لتر', 'symbol' => 'L']);
    \App\Models\Unit::create(['name' => 'كيلوجرام', 'symbol' => 'kg']);
    \App\Models\Unit::create(['name' => 'طرد', 'symbol' => 'pack']);
}
}