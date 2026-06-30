<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-2xl font-bold mb-4">قائمة الأصناف</h1>
            
            <div class="mb-4">
                <a href="{{ route('items.create') }}" class="btn btn-primary" style="background-color: #007bff; color: white; padding: 10px; text-decoration: none; border-radius: 5px;">
                    + إضافة صنف جديد
                </a>
            </div>

            @if(session('success'))
                <div style="background-color: #d4edda; color: #155724; padding: 15px; margin-bottom: 20px; border-radius: 5px;">
                    {{ session('success') }}
                </div>
            @endif

            <table border="1" style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr style="background-color: #f8f9fa;">
                        <th style="padding: 10px; border: 1px solid #ddd;">اسم الصنف</th>
                        <th style="padding: 10px; border: 1px solid #ddd;">التصنيف</th>
                        <th style="padding: 10px; border: 1px solid #ddd;">الوحدة</th>
                        <th style="padding: 10px; border: 1px solid #ddd;">الكمية</th>
                        <th style="padding: 10px; border: 1px solid #ddd;">الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $item)
                    <tr>
                        <td style="padding: 10px; border: 1px solid #ddd;">{{ $item->name }}</td>
                        <td style="padding: 10px; border: 1px solid #ddd;">{{ $item->category->name ?? '---' }}</td>
                        <td style="padding: 10px; border: 1px solid #ddd;">{{ $item->unit->name ?? '---' }}</td>
                        <td style="padding: 10px; border: 1px solid #ddd;">{{ $item->quantity }}</td>
                        <td style="padding: 10px; border: 1px solid #ddd;">
                            <a href="{{ route('items.edit', $item->id) }}" style="color: blue;">تعديل</a>
                            |
                            <form action="{{ route('items.destroy', $item->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('هل أنتِ متأكدة؟');">
                                @csrf @method('DELETE')
                                <button type="submit" style="color: red; border:none; background:none; cursor:pointer;">حذف</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-4">
                {{ $items->links() }}
            </div>
        </div>
    </div>
</x-app-layout>