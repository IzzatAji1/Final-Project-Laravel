<x-layout> 
    <x-slot:title>{{ $title }}</x-slot>


    {{ $products->links() }}

    <div class="my-4 py-4 px-4 mx-auto max-w-screen-xl lg:py-8 lg:px-0">
        <div class="grid gap-8 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
            @forelse ($products as $product)
                <article class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex items-start">
                        <!-- Product Image -->
                        <div class="w-1/3">
                            <a href="/products">
                                <img src="{{ asset('images/fpgambar.png') }}" alt="{{ $product->name }}" class="rounded-lg object-cover w-full h-32">
                            </a>
                        </div>
                        
                        <!-- Product Information -->
                        <div class="w-2/3 pl-4">
                            <!-- Product Name -->
                            <p class="text-sm font-bold text-gray-900 dark:text-white">
                                Nama Produk: 
                            </p>
                            <a class="text-sm text-gray-900 dark:text-white mb-2">
                                {{ $product->name }}
                            </a>

                            <!-- Kategori Produk -->
                            <p class="text-sm font-bold text-gray-900 dark:text-white">
                                Kategori: 
                            </p>
                            <a href="/products/category/{{ $product->category->slug }}" class="text-sm text-gray-900 dark:text-white mb-2 hover:underline">
                                {{ $product->category->name ?? 'Kategori tidak tersedia' }}
                            </a>

                            <!-- Stock Information -->
                            <p class="text-sm font-bold text-gray-900 dark:text-white">
                                Stok: 
                            </p>
                            <a class="text-sm text-gray-900 dark:text-white mb-2">
                                {{ $product->stock }}
                            </a>

                            <!-- Expiration Date -->
                            <p class="text-sm font-bold text-gray-900 dark:text-white">
                                Tanggal Kadaluarsa: 
                            </p>
                            <a class="text-sm text-gray-900 dark:text-white">
                                {{ \Carbon\Carbon::parse($product->expired_at)->format('d-m-Y') }}
                            </a>
                        </div>
                    </div>
                </article>
            @empty
                <p>No products found.</p>
            @endforelse
        </div>  
    </div>

    {{ $products->links() }}


</x-layout>



