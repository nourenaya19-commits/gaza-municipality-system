<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>مخازن بلدية غزة</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { background-color: #f8f9fa; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .bg-custom { background-color: #00816a; }
        #sidebar { width: 250px; min-height: 100vh; background-color: #343a40; color: white; }
        .nav-link { color: white !important; transition: 0.3s; display: flex; align-items: center; gap: 10px; }
        .nav-link:hover { background-color: #00816a; }
        .navbar-brand { margin-right: 15px; }
        /* تنسيق الشعار */
        .logo-img { width: 100px; height: 100px; border-radius: 50%; border: 3px solid #fff; object-fit: cover; }
    </style>
</head>
<body>

<div class="d-flex">
    <div id="sidebar" class="p-3">
<div class="text-center py-4">
    <i class="fas fa-university fa-4x text-white mb-3"></i> <h5 class="fw-bold text-white">بلدية غزة</h5>
    <small class="text-white-50">إدارة المخازن</small>
</div>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="/dashboard" class="nav-link"><i class="fas fa-home"></i> الرئيسية</a>
            </li>
            <li>
                <a href="/items" class="nav-link"><i class="fas fa-box"></i> الأصناف</a>
            </li>
            <li>
                <a href="/categories" class="nav-link"><i class="fas fa-list"></i> التصنيفات</a>
            </li>
            <li>
                <a href="/units" class="nav-link"><i class="fas fa-balance-scale"></i> الوحدات</a>
            </li>
        </ul>
    </div>

    <div class="flex-grow-1">
        <nav class="navbar navbar-dark bg-custom shadow mb-4">
            <div class="container-fluid">
                <span class="navbar-brand fw-bold">لوحة التحكم</span>
            </div>
        </nav>

        <div class="container">
            {{-- رسائل النجاح التلقائية --}}
            @if(session('success'))
                <div class="alert alert-success shadow-sm border-0">
                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                </div>
            @endif

            @yield('content')
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>