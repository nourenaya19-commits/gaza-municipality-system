@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        @if ($errors->any())
            <div class="alert alert-danger shadow-sm">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li><i class="fas fa-exclamation-circle"></i> {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card shadow-lg border-0">
            <div class="card-header bg-warning text-dark fw-bold py-3">
                <i class="fas fa-edit"></i> تعديل بيانات الصنف: {{ $item->name }}
            </div>
            <div class="card-body p-4">
                <form action="{{ route('items.update', $item->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label text-dark fw-bold">اسم الصنف:</label>
                        <input type="text" name="name" class="form-control" value="{{ $item->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-dark fw-bold">السعر:</label>
                        <input type="number" name="price" class="form-control" value="{{ $item->price }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-dark fw-bold">التصنيف:</label>
                        <select name="category_id" class="form-control" required>
                            <option value="">اختر تصنيفاً</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $item->category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-dark fw-bold">الوحدة:</label>
                        <select name="unit_id" class="form-control" required>
                            <option value="">اختر وحدة</option>
                            @foreach($units as $unit)
                                <option value="{{ $unit->id }}" {{ $item->unit_id == $unit->id ? 'selected' : '' }}>
                                    {{ $unit->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-lg btn-warning w-100 mt-3 shadow-sm">
                        <i class="fas fa-save"></i> حفظ التعديلات
                    </button>
                    <a href="{{ route('items.index') }}" class="btn btn-lg btn-light w-100 mt-2 text-dark border">
                        <i class="fas fa-arrow-right"></i> رجوع للقائمة
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection