@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow border-0">
        <div class="card-header bg-custom text-white">إضافة وحدة قياس جديدة</div>
        <div class="card-body">
            <form action="{{ route('units.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>اسم الوحدة</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>الرمز (مثال: كجم، متر)</label>
                    <input type="text" name="symbol" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success">حفظ الوحدة</button>
                <a href="{{ route('units.index') }}" class="btn btn-secondary">إلغاء</a>
            </form>
        </div>
    </div>
</div>
@endsection