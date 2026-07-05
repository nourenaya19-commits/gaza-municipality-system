@extends('adminlte::page')

@section('title', 'تعديل مادة')

@section('content_header')
    <h1>تعديل بيانات المادة: {{ $item->name }}</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('items.update', $item->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6 form-group">
                    <label>اسم المادة</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $item->name) }}" required>
                </div>

                <div class="col-md-6 form-group">
                    <label>السعر</label>
                    <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price', $item->price) }}" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 form-group">
                    <label>التصنيف</label>
                    <select name="category_id" class="form-control" required>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $item->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4 form-group">
                    <label>وحدة القياس</label>
                    <select name="unit_id" class="form-control" required>
                        @foreach($units as $unit)
                            <option value="{{ $unit->id }}" {{ $item->unit_id == $unit->id ? 'selected' : '' }}>
                                {{ $unit->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4 form-group">
                    <label>المخزن</label>
                    <select name="store_id" class="form-control" required>
                        @foreach($stores as $store)
                            <option value="{{ $store->id }}" {{ $item->store_id == $store->id ? 'selected' : '' }}>
                                {{ $store->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label>الكمية الحالية</label>
                <input type="number" name="quantity" class="form-control" value="{{ old('quantity', $item->quantity) }}" required>
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-success">حفظ التعديلات</button>
                <a href="{{ route('items.index') }}" class="btn btn-secondary">إلغاء</a>
            </div>
        </form>
    </div>
</div>
@stop