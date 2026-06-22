@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white fw-bold py-3">
                <i class="fas fa-folder-plus"></i> إضافة تصنيف جديد
            </div>
            <div class="card-body p-4">
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-bold">اسم التصنيف:</label>
                        <input type="text" name="name" class="form-control" placeholder="مثال: مواد بناء" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">الوصف (اختياري):</label>
                        <textarea name="description" class="form-control" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">حفظ التصنيف</button>
                    <a href="{{ route('categories.index') }}" class="btn btn-light w-100 mt-2">رجوع</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection