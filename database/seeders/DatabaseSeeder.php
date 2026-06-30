<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Unit;
use App\Models\Category; 

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // إضافة الوحدات
        Unit::create(['name' => 'قطعة', 'symbol' => 'pc']);
        Unit::create(['name' => 'متر', 'symbol' => 'm']);

        // إضافة التصنيفات
        Category::create(['name' => 'سباكة']);
        Category::create(['name' => 'كهرباء']);
        Category::create(['name' => 'أدوات بناء']);
        
    }
}