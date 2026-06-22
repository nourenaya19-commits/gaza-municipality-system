<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class ItemController extends Controller
{
public function index()
{
    $items = \App\Models\Item::all();
    return view('items.index', compact('items'));
}

public function create()
{
    $categories = \App\Models\Category::all();
    $units = \App\Models\Unit::all(); 
    return view('items.create', compact('categories', 'units'));
}
public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'price' => 'required|numeric',
        'category_id' => 'required',
        'unit_id' => 'required',
    ]);

    \App\Models\Item::create($request->all());

    return redirect()->route('items.index');
}

public function edit($id)
{
    $item = \App\Models\Item::findOrFail($id);
    $categories = \App\Models\Category::all();
    $units = \App\Models\Unit::all(); 
    return view('items.edit', compact('item', 'categories', 'units'));
}

    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'price' => 'required|numeric',
        'category_id' => 'required|exists:categories,id', // تأكدي من وجود هذا السطر
    ]);

    $item = \App\Models\Item::findOrFail($id);
    
  
    $item->update([
        'name' => $request->name,
        'price' => $request->price,
        'category_id' => $request->category_id,
    ]);

    return redirect()->route('items.index')->with('success', 'تم تحديث بيانات الصنف بنجاح!');
}

    public function destroy($id)
    {
        DB::table('items')->where('id', $id)->delete();
        return redirect('/items')->with('success', 'تم حذف الصنف بنجاح!');
    }
}