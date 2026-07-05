@extends('adminlte::page')

@section('title', 'قائمة المواد')

@section('content_header')
    <h1>إدارة المواد - بلدية غزة</h1>
@stop

@section('content')
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">قائمة المواد المخزنية</h3>
            <div class="card-tools">
                <a href="{{ route('items.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i> إضافة مادة جديدة
                </a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>اسم المادة</th>
                        <th>التصنيف</th>
                        <th>الوحدة</th>
                        <th>المخزن</th>
                        <th>السعر</th>
                        <th>الكمية</th>
                        <th>الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($items as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->category->name ?? '---' }}</td>
                            <td>{{ $item->unit->name ?? '---' }}</td>
                            <td>{{ $item->store->name ?? '---' }}</td>
                            <td>{{ number_format($item->price, 2) }} شيكل</td>
                            <td><span class="badge badge-info">{{ $item->quantity }}</span></td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('items.edit', $item->id) }}" class="btn btn-sm btn-warning mr-1">تعديل</a>
                                    <form action="{{ route('items.destroy', $item->id) }}" method="POST" onsubmit="return confirm('هل أنتِ متأكدة من حذف هذه المادة؟');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">حذف</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">لا توجد مواد مضافة حالياً في النظام.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop