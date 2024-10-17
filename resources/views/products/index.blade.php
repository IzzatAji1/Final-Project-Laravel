<x-layout> 
    <x-slot:title>{{ $title }}</x-slot>

    <!-- Button to Create New Product -->
    <div class="mb-4">
        <a href="{{ route('products.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            <svg class="w-6 h-6 mr-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 7.757v8.486M7.757 12h8.486M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
            </svg>
            Tambah Produk
        </a>
    </div>

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

                    <!-- Action Buttons for Edit and Delete -->
                    <div class="mt-4 flex justify-end relative">
                        <!-- Button with SVG for options -->
                        <button class="flex items-center text-gray-800 dark:text-white" onclick="toggleOptions({{ $product->id }})">
                            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M12 6h.01M12 12h.01M12 18h.01"/>
                            </svg>
                        </button>

                        <!-- Options for Edit and Delete styled like dropdown -->
                        <div id="options-{{ $product->id }}" class="hidden absolute right-0 mt-2 w-48 p-2 bg-white border border-gray-300 rounded-lg shadow-lg z-10">
                            <a href="{{ route('products.edit', $product) }}" class="block px-4 py-2 text-sm text-blue-500 hover:bg-gray-100 rounded">Edit</a>
                            <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline-block w-full">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="block px-4 py-2 text-sm text-red-500 hover:bg-gray-100 rounded w-full text-left">Delete</button>
                            </form>
                        </div>
                    </div>
                </article>
            @empty
                <p>No products found.</p>
            @endforelse
        </div>  
    </div>

    {{ $products->links() }}

    <script>
        let activeOptions = null;

        // Function to toggle options for a specific product
        function toggleOptions(id) {
            const options = document.getElementById('options-' + id);

            // If there's another active options dropdown, close it
            if (activeOptions && activeOptions !== options) {
                activeOptions.classList.add('hidden');
            }

            // Toggle the current options dropdown
            options.classList.toggle('hidden');

            // Set the current options as active
            activeOptions = options.classList.contains('hidden') ? null : options;
        }

        // Event listener to detect click outside of any dropdown and close it
        document.addEventListener('click', function(event) {
            const target = event.target;

            // Check if the clicked element is inside an options dropdown or button
            const isInsideOptions = target.closest('.relative') !== null;

            if (!isInsideOptions && activeOptions) {
                // If clicked outside, hide the active options dropdown
                activeOptions.classList.add('hidden');
                activeOptions = null;
            }
        });
    </script>

</x-layout>
