<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        // جلب كل المخازن من قاعدة البيانات
        $stores = Store::all();
        
        // إرسالها لصفحة العرض (index)
        return view('stores.index', compact('stores'));
    }

    public function create()
{
   
    return view('stores.create');
}

public function store(Request $request)
{
    // التحقق من البيانات
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    // حفظ البيانات في قاعدة البيانات
    \App\Models\Store::create($request->all());

    // العودة لقائمة المخازن مع رسالة نجاح
    return redirect()->route('stores.index')->with('success', 'تمت إضافة المخزن بنجاح!');
}

// لعرض صفحة التعديل
public function edit($id)
{
    $store = \App\Models\Store::findOrFail($id);
    return view('stores.edit', compact('store'));
}

// لحفظ التعديلات في قاعدة البيانات
public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    $store = \App\Models\Store::findOrFail($id);
    $store->update($request->all());

    return redirect()->route('stores.index')->with('success', 'تم تعديل بيانات المخزن بنجاح!');
}

public function destroy($id)
{
    $store = \App\Models\Store::findOrFail($id);
    $store->delete();

    return redirect()->route('stores.index')->with('success', 'تم حذف المخزن بنجاح!');
}
}