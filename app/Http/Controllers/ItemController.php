<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use App\Models\Unit;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
      $items = Item::with(['category', 'unit'])->latest()->paginate(10);
    return view('items.index', compact('items'));
    }

    public function edit($id)
{
    $item = Item::findOrFail($id);
    $categories = Category::all();
    $units = Unit::all();
    return view('items.edit', compact('item', 'categories', 'units'));
}
public function destroy($id)
{
    $item = \App\Models\Item::findOrFail($id);
    $item->delete();

    return redirect()->route('items.index')->with('success', 'تم حذف الصنف بنجاح!');
}
public function update(Request $request, $id)
{
    $item = Item::findOrFail($id);
    
    $request->validate([
        'name' => 'required|string|max:255',
        'quantity' => 'required|numeric',
        'price' => 'required|numeric',
        'category_id' => 'required',
        'unit_id' => 'required',
    ],[
    'name.required' => 'يجب إدخال اسم الصنف.',
    'quantity.required' => 'حقل الكمية مطلوب.',
    'quantity.numeric' => 'الكمية يجب أن تكون أرقاماً.',
    'price.required' => 'حقل السعر مطلوب.',
]);


    $item->update($request->all());

    return redirect()->route('items.index')->with('success', 'تم التحديث بنجاح');
}

    public function create()
    {
        $categories = Category::all();
        $units = Unit::all();
        return view('items.create', compact('categories', 'units'));
    }

    public function store(Request $request)
{
    
    $request->validate([
        'name' => 'required|string|max:255',
        'quantity' => 'required|numeric|min:0', 
        'category_id' => 'required|exists:categories,id',
        'unit_id' => 'required|exists:units,id',
    ], [
        'name.required' => 'اسم الصنف حقل مطلوب.',
        'quantity.min' => 'الكمية يجب أن تكون أكبر من أو تساوي صفر.',
        'quantity.required' => 'حقل الكمية مطلوب.',
    'quantity.numeric' => 'الكمية يجب أن تكون أرقاماً.',
    'price.required' => 'حقل السعر مطلوب.',
    ]);

    
    Item::create($request->all());
    return redirect()->route('items.index')->with('success', 'تم إضافة الصنف بنجاح!');
}
}