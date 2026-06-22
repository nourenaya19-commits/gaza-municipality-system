@extends('layouts.app')

@section('content')
<div class="container-fluid mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-secondary fw-bold">إدارة الأصناف</h2>
        <a href="{{ route('items.create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i> إضافة صنف جديد
        </a>
    </div>

    <div class="card shadow border-0">
        <div class="card-body p-0">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">#</th>
                        <th>اسم الصنف</th>
                        <th>التصنيف</th>
                        <th>الوحدة</th>
                        <th class="text-center">الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $item)
                    <tr>
                        <td class="ps-4">{{ $item->id }}</td>
                        <td class="fw-bold">{{ $item->name }}</td>
                        <td>{{ $item->category ? $item->category->name : 'غير محدد' }}</td>
                        <td>{{ $item->unit ? $item->unit->name : 'غير محدد' }}</td>
                        <td class="text-center">
                            <a href="{{ route('items.edit', $item->id) }}" class="btn btn-sm btn-outline-primary">تعديل</a>
                            <form action="{{ route('items.destroy', $item->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger" onclick="return confirm('هل أنت متأكد؟')">حذف</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection