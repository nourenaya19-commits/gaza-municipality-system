<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    public function index()
    {
        $items = DB::table('items')->get();
        return view('items.index', compact('items'));
    }

    public function create()
    {
        return view('items.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'price' => 'required|numeric|min:0',
        ]);

        DB::table('items')->insert([
            'name' => $request->name,
            'price' => $request->price,
            'created_at' => now(),
        ]);

        return redirect('/items')->with('success', 'تمت إضافة الصنف بنجاح!');
    }

    public function edit($id)
    {
        $item = DB::table('items')->where('id', $id)->first();
        return view('items.edit', ['item' => $item]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3',
            'price' => 'required|numeric|min:0',
        ]);

        DB::table('items')->where('id', $id)->update([
            'name' => $request->name,
            'price' => $request->price,
            'updated_at' => now(),
        ]);

        return redirect('/items')->with('success', 'تم تحديث بيانات الصنف بنجاح!');
    }

    public function destroy($id)
    {
        DB::table('items')->where('id', $id)->delete();
        return redirect('/items')->with('success', 'تم حذف الصنف بنجاح!');
    }
}