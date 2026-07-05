@extends('adminlte::page')
@section('title', 'تعديل بيانات المخزن')

@section('content_header')
    <h1>تعديل المخزن: {{ $store->name }}</h1>
@stop

@section('content')
<div class="card card-warning">
    <form action="{{ route('stores.update', $store->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="form-group">
                <label>اسم المخزن</label>
                <input type="text" name="name" class="form-control" value="{{ $store->name }}" required>
            </div>
            <div class="form-group">
                <label>موقع المخزن</label>
                <input type="text" name="address_location" class="form-control" value="{{ $store->address_location }}">
            </div>
            <div class="form-group">
                <label>الحالة</label>
                <select name="status" class="form-control">
                    <option value="active" {{ $store->status == 'active' ? 'selected' : '' }}>نشط</option>
                    <option value="inactive" {{ $store->status == 'inactive' ? 'selected' : '' }}>غير نشط</option>
                </select>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-warning">حفظ التعديلات</button>
        </div>
    </form>
</div>
@stop