@extends('layouts.app')

@section('content')
<div class="card col-md-6 mx-auto">
    <div class="card-body">
        <h3>تعديل التصنيف: {{ $category->name }}</h3>
        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>اسم التصنيف:</label>
                <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
            </div>
            <button type="submit" class="btn btn-success">حفظ التعديلات</button>
        </form>
    </div>
</div>
@endsection