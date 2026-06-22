<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;

class UnitController extends Controller
{
    public function index()
    {
        $units = Unit::all();
        return view('units.index', compact('units'));
    }

    public function create()
    {
        return view('units.create');
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string|max:255',
            'symbol' => 'required|string|max:50',
        ]);

        Unit::create($request->all());
        return redirect()->route('units.index')->with('success', 'تمت إضافة الوحدة بنجاح');
    }

    public function edit($id)
    {
        $unit = Unit::findOrFail($id);
        return view('units.edit', compact('unit'));
    }

    public function update(Request $request, $id)
    {
        // التحقق من البيانات أثناء التعديل
        $request->validate([
            'name' => 'required|string|max:255',
            'symbol' => 'required|string|max:50',
        ]);

        $unit = Unit::findOrFail($id);
        $unit->update($request->all());
        return redirect()->route('units.index')->with('success', 'تم تحديث الوحدة بنجاح');
    }

    public function destroy($id)
    {
        $unit = Unit::findOrFail($id);
        $unit->delete();
        return redirect()->route('units.index')->with('success', 'تم الحذف بنجاح!');
    }
}