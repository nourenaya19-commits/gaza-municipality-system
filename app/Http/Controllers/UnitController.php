<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UnitController extends Controller
{
    // عرض الكل
    public function index() {
        $units = DB::table('units')->get();
        return view('units.index', compact('units'));
    }

    // عرض صفحة الإضافة
    public function create() {
        return view('units.create');
    }

    // حفظ البيانات (احترافياً)
    public function store(Request $request) {
        DB::table('units')->insert([
            'name' => $request->name,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect('/units')->with('success', 'تم إضافة الوحدة بنجاح');
    }
}