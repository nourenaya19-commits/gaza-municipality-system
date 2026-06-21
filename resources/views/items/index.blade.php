<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>قائمة الأصناف | مخازن بلدية غزة</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
        <div class="row mb-4">
            <div class="col">
                <h1 class="h2 text-dark">نظام إدارة الأصناف في المخازن</h1>
                <p class="text-muted">جدول يعرض جميع المواد والأصناف الحالية.</p>
            </div>
            <div class="col-auto text-start">
                <a href="/items/create" class="btn btn-lg btn-success">+ إضافة صنف جديد</a>
            </div>
        </div>

        <div class="card shadow">
            <div class="card-body">
                <table class="table table-striped table-hover table-bordered align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>اسم الصنف</th>
                            <th>السعر</th>
                            <th class="text-center">الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->price }}</td>
                            <td class="text-center">
                                <a href="/items/{{ $item->id }}/edit" class="btn btn-sm btn-warning">تعديل</a>
                                <form action="/items/{{ $item->id }}" method="POST" style="display:inline;" onsubmit="return confirm('هل أنتِ متأكدة؟')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">حذف</button>
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