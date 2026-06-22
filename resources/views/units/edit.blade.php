@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow border-0">
        <div class="card-header bg-custom text-white">تعديل وحدة القياس</div>
        <div class="card-body">
            <form action="{{ route('units.update', $unit->id) }}" method="POST">
                @csrf @method('PUT')
                <div class="mb-3">
                    <label>اسم الوحدة</label>
                    <input type="text" name="name" value="{{ $unit->name }}" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>الرمز</label>
                    <input type="text" name="symbol" value="{{ $unit->symbol }}" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">تحديث البيانات</button>
            </form>
        </div>
    </div>
</div>
@endsection