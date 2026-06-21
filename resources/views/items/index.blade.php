<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>قائمة الأصناف | مخازن بلدية غزة</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { background-color: #f8f9fa; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .bg-custom { background-color: #00816a; }
    </style>
</head>
<body>

    <nav class="navbar navbar-dark bg-custom shadow">
        <div class="container">
            <a class="navbar-brand text-light fw-bold" href="/items">مخازن بلدية غزة</a>
        </div>
    </nav>

    <div class="container mt-5">
        
        @if(session('success'))
            <div class="alert alert-success text-center shadow-sm mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="row mb-4 align-items-center">
            <div class="col">
                <h1 class="h2 text-dark">نظام إدارة الأصناف</h1>
                <p class="text-muted">عرض وإدارة كافة المواد الموجودة في المخزن.</p>
            </div>
            <div class="col-auto">
                <a href="/items/create" class="btn btn-lg btn-success shadow-sm">
                    <i class="fas fa-plus"></i> إضافة صنف جديد
                </a>
            </div>
        </div>

        <div class="card shadow border-0">
            <div class="card-body p-0">
                <table class="table table-hover table-striped align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th class="ps-4">#</th>
                            <th>اسم الصنف</th>
                            <th>السعر</th>
                            <th class="text-center">الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $item)
                        <tr>
                            <td class="ps-4">{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->price }} شيكل</td>
                            <td class="text-center">
                                <a href="/items/{{ $item->id }}/edit" class="btn btn-sm btn-warning text-white">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="/items/{{ $item->id }}" method="POST" style="display:inline;" onsubmit="return confirm('هل أنتِ متأكدة من حذف هذا الصنف؟')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>