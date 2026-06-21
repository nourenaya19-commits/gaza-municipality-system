<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>تعديل صنف | مخازن بلدية غزة</title>
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
        <div class="row justify-content-center">
            <div class="col-md-8">
                
                @if ($errors->any())
                    <div class="alert alert-danger shadow-sm">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li><i class="fas fa-exclamation-circle"></i> {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card shadow-lg border-0">
                    <div class="card-header bg-warning text-dark fw-bold py-3">
                        <i class="fas fa-edit"></i> تعديل بيانات الصنف: {{ $item->name }}
                    </div>
                    <div class="card-body p-4">
                        <form action="/items/{{ $item->id }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label text-dark fw-bold">اسم الصنف:</label>
                                <input type="text" name="name" class="form-control" value="{{ $item->name }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label text-dark fw-bold">السعر:</label>
                                <input type="number" name="price" class="form-control" value="{{ $item->price }}" required>
                            </div>
                            <button type="submit" class="btn btn-lg btn-warning w-100 mt-3 shadow-sm">
                                <i class="fas fa-save"></i> حفظ التعديلات
                            </button>
                            <a href="/items" class="btn btn-lg btn-light w-100 mt-2 text-dark border">
                                <i class="fas fa-arrow-right"></i> رجوع للقائمة
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>