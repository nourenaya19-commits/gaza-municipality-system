@extends('layouts.app')

@section('content')
    <h2>وحدات القياس</h2>
    <a href="/units/create">إضافة وحدة جديدة</a>
    <table border="1">
        @foreach($units as $unit)
            <tr>
                <td>{{ $unit->name }}</td>
            </tr>
        @endforeach
    </table>
@endsection