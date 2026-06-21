<h1>قائمة التصنيفات</h1>

<table border="1">
    <tr>
        <th>ID</th>
        <th>الاسم</th>
        <th>الوصف</th>
    </tr>
    @foreach($categories as $category)
    <tr>
        <td>{{ $category->id }}</td>
        <td>{{ $category->name }}</td>
        <td>{{ $category->description }}</td>
    </tr>
    @endforeach
</table>