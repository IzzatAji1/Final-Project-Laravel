<x-layout>
    <x-slot:title>{{ $title }}</x-slot>

    <h1 class="text-2xl font-bold mb-6">Edit Product: {{ $product->name }}</h1>

    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block text-gray-700">Product Name</label>
            <input type="text" name="name" id="name" class="w-full p-2 border border-gray-300 rounded" value="{{ old('name', $product->name) }}">
            @error('name')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="category_id" class="block text-gray-700">Category</label>
            <select name="category_id" id="category_id" class="w-full p-2 border border-gray-300 rounded">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="stock" class="block text-gray-700">Stock</label>
            <input type="number" name="stock" id="stock" class="w-full p-2 border border-gray-300 rounded" value="{{ old('stock', $product->stock) }}">
            @error('stock')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="expired_at" class="block text-gray-700">Expiration Date</label>
            <input type="date" name="expired_at" id="expired_at" class="w-full p-2 border border-gray-300 rounded" value="{{ old('expired_at', $product->expired_at->format('Y-m-d')) }}">
            @error('expired_at')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update Product</button>
    </form>
</x-layout>
