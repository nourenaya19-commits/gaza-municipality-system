@extends('adminlte::page')

@section('title', 'إضافة مخزن جديد')

@section('content_header')
    <h1>إضافة مخزن جديد</h1>
@stop

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">بيانات المخزن</h3>
    </div>
    <form action="{{ route('stores.store') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label>اسم المخزن</label>
                <input type="text" name="name" class="form-control" placeholder="أدخل اسم المخزن" required>
            </div>
            <div class="form-group">
                <label>موقع المخزن</label>
                <input type="text" name="address_location" class="form-control" placeholder="أدخل العنوان أو الموقع">
            </div>
            <div class="form-group">
                <label>الحالة</label>
                <select name="status" class="form-control">
                    <option value="active">نشط</option>
                    <option value="inactive">غير نشط</option>
                </select>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">حفظ المخزن</button>
            <a href="{{ route('stores.index') }}" class="btn btn-default">إلغاء</a>
        </div>
    </form>
</div>
@stop