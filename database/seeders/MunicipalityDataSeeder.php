<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Unit;

class MunicipalityDataSeeder extends Seeder
{
    public function run()
    {
        // 1. إضافة التصنيفات الشائعة في البلدية
        $categories = [
            ['name' => 'قطع غيار آليات', 'description' => 'قطع غيار شاحنات، جرافات، ومعدات ثقيلة'],
            ['name' => 'مواد بناء', 'description' => 'إسمنت، حديد، بلاط، مواد صيانة طرق'],
            ['name' => 'قرطاسية ومطبوعات', 'description' => 'أوراق، أقلام، ملفات، مستلزمات مكتبية'],
            ['name' => 'مواد تنظيف', 'description' => 'منظفات عامة، مستلزمات صحية'],
            ['name' => 'كهرباء ومياه', 'description' => 'قطع توصيلات مياه، كابلات كهربائية، لمبات'],
        ];

        foreach ($categories as $cat) {
            Category::create($cat);
        }

        // 2. إضافة وحدات القياس
        $units = [
            ['name' => 'قطعة', 'symbol' => 'pcs'],
            ['name' => 'كيلو جرام', 'symbol' => 'kg'],
            ['name' => 'متر طولي', 'symbol' => 'm'],
            ['name' => 'متر مربع', 'symbol' => 'm2'],
            ['name' => 'لتر', 'symbol' => 'L'],
            ['name' => 'كرتونة', 'symbol' => 'box'],
        ];

        foreach ($units as $unit) {
            Unit::create($unit);
        }
    }
}