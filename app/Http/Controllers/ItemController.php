<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use App\Models\Unit;
use Illuminate\Http\Request;
use App\Models\Store;


class ItemController extends Controller
{
public function index() {
    $items = \App\Models\Item::with(['category', 'unit', 'store'])->get();
    return view('items.index', compact('items'));
}

public function edit($id)
{
    $item = \App\Models\Item::findOrFail($id);
    $categories = \App\Models\Category::all();
    $units = \App\Models\Unit::all();
    $stores = \App\Models\Store::all(); // لا تنسي جلب المخازن

    return view('items.edit', compact('item', 'categories', 'units', 'stores'));
}
public function destroy($id)
{
    $item = \App\Models\Item::findOrFail($id);
    $item->delete();

    return redirect()->route('items.index')->with('success', 'تم حذف الصنف بنجاح!');
}
public function update(Request $request, $id)
{
    $item = \App\Models\Item::findOrFail($id);
    
    // هذا السطر سيحفظ كل شيء تم تغييره، بما في ذلك الـ ID الجديد للتصنيف أو الوحدة
    $item->update($request->all());

    return redirect()->route('items.index')->with('success', 'تم تحديث المادة بنجاح');
}
public function create()
{
    $stores = \App\Models\Store::all();
    $categories = \App\Models\Category::all();
    $units = \App\Models\Unit::all();

return view('items.create', compact('stores', 'categories', 'units'));}

public function store(Request $request)
{
    // 1. التحقق من البيانات المدخلة
    $request->validate([
        'name' => 'required',
        'category_id' => 'required',
        'unit_id' => 'required',
        'store_id' => 'required', 
        'price' => 'required',
        'quantity' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // التحقق من أن الملف صورة وبحجم لا يتجاوز 2 ميجا
    ]);

    // 2. تحضير البيانات للحفظ
    $data = $request->all();

    // 3. معالجة رفع الصورة إذا وجدت
    if ($request->hasFile('image')) {
        // حفظ الصورة في مجلد 'items' داخل الـ public storage
        $path = $request->file('image')->store('items', 'public');
        // إضافة مسار الصورة إلى المصفوفة التي ستُحفظ في قاعدة البيانات
        $data['image'] = $path;
    }

    // 4. إنشاء المادة
    \App\Models\Item::create($data);

    return redirect()->route('items.index')->with('success', 'تمت إضافة المادة مع الصورة بنجاح!');
}
}