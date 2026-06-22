@extends('layouts.app')

@section('content')
<div class="container-fluid mt-4">
    <h2 class="mb-4 fw-bold text-secondary">لوحة تحكم إدارة المخازن</h2>
    
    <div class="row">
        <div class="col-md-4">
            <div class="card text-white bg-info mb-3 shadow border-0">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-boxes"></i> إجمالي الأصناف</h5>
                    <p class="card-text h2 mt-2">15</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-success mb-3 shadow border-0">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-box-open"></i> إدارة المخزن</h5>
                    <a href="{{ route('items.index') }}" class="btn btn-light btn-sm mt-2 fw-bold text-success">
                        <i class="fas fa-arrow-left"></i> عرض الأصناف
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3 shadow border-0">
                <div class="card-body">
                    <h5 class="card-title text-dark"><i class="fas fa-balance-scale"></i> إدارة الوحدات</h5>
                    <a href="{{ route('units.index') }}" class="btn btn-light btn-sm mt-2 fw-bold text-dark">
                        <i class="fas fa-arrow-left"></i> عرض الوحدات
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection