<form action="/categories" method="POST">
    @csrf
    <input type="text" name="name" placeholder="اسم التصنيف" required>
    <input type="text" name="description" placeholder="الوصف">
    <button type="submit">حفظ</button>
</form>