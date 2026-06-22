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
            <div class="card-header bg-custom text-white fw-bold py-3">
                <i class="fas fa-plus-circle"></i> إضافة صنف جديد للمخزن
            </div>
            <div class="card-body p-4">
                <form action="{{ route('items.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label text-dark fw-bold">اسم الصنف:</label>
                        <input type="text" name="name" class="form-control" placeholder="مثال: أسمنت بورتلاندي" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-dark fw-bold">السعر:</label>
                        <input type="number" name="price" class="form-control" placeholder="مثال: 50" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-dark fw-bold">التصنيف:</label>
                        <select name="category_id" class="form-control" required>
                            <option value="">-- اختاري التصنيف --</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-dark fw-bold">الوحدة:</label>
                        <select name="unit_id" class="form-control" required>
                            <option value="">-- اختاري الوحدة --</option>
                            @foreach($units as $unit)
                                <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-lg btn-success w-100 mt-3 shadow-sm">
                        <i class="fas fa-save"></i> حفظ الصنف
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