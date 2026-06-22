@extends('layouts.app')

@section('content')
<div class="container-fluid mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-secondary fw-bold">إدارة وحدات القياس</h2>
        <a href="{{ route('units.create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i> إضافة وحدة جديدة
        </a>
    </div>

    <div class="card shadow border-0">
        <div class="card-body p-0">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">#</th>
                        <th>اسم الوحدة</th>
                        <th>الرمز</th>
                        <th class="text-center">الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($units as $unit)
                    <tr>
                        <td class="ps-4">{{ $unit->id }}</td>
                        <td class="fw-bold">{{ $unit->name }}</td>
                        <td><span class="badge bg-secondary">{{ $unit->symbol }}</span></td>
                        <td class="text-center">
                            {{-- أزرار التعديل والحذف --}}
                            <a href="{{ route('units.edit', $unit->id) }}" class="btn btn-sm btn-outline-primary me-2">
                                <i class="fas fa-edit"></i> تعديل
                            </a>
                            <form action="{{ route('units.destroy', $unit->id) }}" method="POST" class="d-inline">
                                @csrf 
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('هل أنت متأكد من الحذف؟')">
                                    <i class="fas fa-trash"></i> حذف
                                </button>
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