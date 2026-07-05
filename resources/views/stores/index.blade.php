@extends('adminlte::page')

@section('title', 'إدارة المخازن')

@section('content_header')
    <h1>إدارة المخازن</h1>
@stop

@section('content')
    {{-- رسالة النجاح عند الإضافة أو التعديل أو الحذف --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">قائمة المخازن المسجلة</h3>
            <div class="card-tools">
                <a href="{{ route('stores.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i> إضافة مخزن جديد
                </a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>اسم المخزن</th>
                        <th>الموقع</th>
                        <th>الحالة</th>
                        <th>الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($stores as $store)
                        <tr>
                            <td>{{ $store->name ?? 'غير محدد' }}</td>
                            <td>{{ $store->address_location ?? 'غير محدد' }}</td>
                            <td>
                                @if($store->status == 'active')
                                    <span class="badge badge-success">نشط</span>
                                @else
                                    <span class="badge badge-secondary">غير نشط</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex">
                                    {{-- زر التعديل --}}
                                    <a href="{{ route('stores.edit', $store->id) }}" class="btn btn-sm btn-warning mr-2">تعديل</a>
                                    
                                    {{-- زر الحذف --}}
                                    <form action="{{ route('stores.destroy', $store->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من الحذف؟');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">حذف</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">لا توجد مخازن مضافة حالياً</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop