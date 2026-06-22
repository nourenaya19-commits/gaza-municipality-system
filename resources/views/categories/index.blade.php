@extends('layouts.app')

@section('content')
<div class="container-fluid mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-secondary fw-bold">إدارة التصنيفات</h2>
        <a href="{{ route('categories.create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i> إضافة تصنيف جديد
        </a>
    </div>

    <div class="card shadow border-0">
        <div class="card-body p-0">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">#</th>
                        <th>اسم التصنيف</th>
                        <th class="text-center">الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td class="ps-4">{{ $category->id }}</td>
                        <td class="fw-bold">{{ $category->name }}</td>
                        <td class="text-center">
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-outline-primary">تعديل</a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline">
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