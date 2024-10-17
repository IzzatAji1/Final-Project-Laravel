<x-layout>
    <x-slot:title>{{ $title }}</x-slot>

    <div class="my-4 py-4 px-4 mx-auto max-w-screen-xl lg:py-8 lg:px-0">
        <h1 class="text-3xl font-bold">{{ $product->name }}</h1>

        <div class="my-4">
            <p><strong>Category: </strong>{{ $product->category->name }}</p>
            <p><strong>Stock: </strong>{{ $product->stock }}</p>
            <p><strong>Expiration Date: </strong>{{ $product->expired_at->format('d-m-Y') }}</p>
        </div>
        
        <a href="{{ route('products.index') }}" class="text-blue-500 hover:underline">Back to Products</a>
    </div>
</x-layout>
