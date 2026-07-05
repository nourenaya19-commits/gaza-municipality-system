@extends('adminlte::page')

@section('title', 'عرض المواد')

@section('content_header')
    <h1>قائمة المواد المخزنية</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">جدول المواد</h3>
        <div class="card-tools">
            <a href="{{ route('items.create') }}" class="btn btn-primary btn-sm">إضافة مادة جديدة</a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>صورة المادة</th>
                    <th>اسم المادة</th>
                    <th>المخزن</th>
                    <th>التصنيف</th>
                    <th>الوحدة</th>
                    <th>الكمية</th>
                    <th>السعر</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                <tr>
                    <td>
                        @if($item->image)
                            <img src="{{ asset('storage/' . $item->image) }}" width="60" height="60" style="object-fit: cover; border-radius: 5px;" alt="صورة المادة">
                        @else
                            <span class="text-muted">لا يوجد</span>
                        @endif
                    </td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->store->name ?? 'غير محدد' }}</td>
                    <td>{{ $item->category->name ?? 'غير محدد' }}</td>
                    <td>{{ $item->unit->name ?? 'غير محدد' }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ number_format($item->price, 2) }} شيكل</td>
                    <td>
                        <a href="{{ route('items.edit', $item->id) }}" class="btn btn-info btn-sm">تعديل</a>
                        <form action="{{ route('items.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('هل أنت متأكد؟')">حذف</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop