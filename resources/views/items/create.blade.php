<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            إضافة صنف جديد
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <form action="{{ route('items.store') }}" method="POST">
                    @csrf

                    <!-- اسم الصنف -->
                    <div class="mb-4">
                        <label class="block mb-2 font-bold">اسم الصنف</label>
                        <input type="text" name="name" class="w-full border p-2 rounded" required>
                    </div>

                    <!-- التصنيف -->
                    <div class="mb-4">
                        <label class="block mb-2 font-bold">التصنيف</label>
                        <select name="category_id" class="w-full border p-2 rounded" required>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- الوحدة -->
                    <div class="mb-4">
                        <label class="block mb-2 font-bold">الوحدة</label>
                        <select name="unit_id" class="w-full border p-2 rounded" required>
                            @foreach($units as $unit)
                                <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- الكمية -->
                    <div class="mb-4">
                        <label class="block mb-2 font-bold">الكمية</label>
                        <input type="number" name="quantity" class="w-full border p-2 rounded" required>
                    </div>

                    <!-- زر الحفظ -->
                    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                        حفظ الصنف
                    </button>
                    
                    <!-- زر الرجوع -->
                    <a href="{{ route('items.index') }}" class="ml-4 text-gray-600">إلغاء</a>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>