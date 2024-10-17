<x-layout> 
    <x-slot:title>{{ $title }}</x-slot>

    <!-- Button to Create New Product -->
    <div class="mb-4">
        <a href="{{ route('products.create') }}">
            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4.243a1 1 0 1 0-2 0V11H7.757a1 1 0 1 0 0 2H11v3.243a1 1 0 1 0 2 0V13h3.243a1 1 0 1 0 0-2H13V7.757Z" clip-rule="evenodd"/>
              </svg>
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

                    <!-- Action Buttons for View, Edit, and Delete -->
                    <div class="mt-4 flex justify-between items-center">
                        <!-- View Product Button (Left) -->
                        <a href="{{ route('products.show', $product) }}" class="px-4 py-2 text-sm text-white bg-blue-500 rounded hover:bg-blue-600">
                            View Product
                        </a>

                        <!-- Inside the product listing, replace the delete form -->
                        <div class="relative">
                            <button class="flex items-center text-gray-800 dark:text-white" onclick="toggleOptions({{ $product->id }})">
                                <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M12 6h.01M12 12h.01M12 18h.01"/>
                                </svg>
                            </button>

                            <div id="options-{{ $product->id }}" class="hidden absolute right-0 mt-2 w-48 p-2 bg-white border border-gray-300 rounded-lg shadow-lg z-10">
                                <a href="{{ route('products.edit', $product) }}" class="block px-4 py-2 text-sm text-blue-500 hover:bg-gray-100 rounded">Edit</a>
                                <!-- Updated Delete Button -->
                                <button data-modal-target="deleteModal-{{ $product->id }}" data-modal-toggle="deleteModal-{{ $product->id }}" class="block px-4 py-2 text-sm text-red-500 hover:bg-gray-100 rounded w-full text-left">
                                    Delete
                                </button>
                            </div>
                        </div>

                        <!-- Modal for delete confirmation -->
                        <div id="deleteModal-{{ $product->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                            <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                                <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                                    <button type="button" class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="deleteModal-{{ $product->id }}">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                    <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to delete this item?</p>
                                    <div class="flex justify-center items-center space-x-4">
                                        <button data-modal-toggle="deleteModal-{{ $product->id }}" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                            No, cancel
                                        </button>
                                        <form action="{{ route('products.destroy', $product) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                                Yes, I'm sure
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
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

        function toggleOptions(id) {
            const options = document.getElementById('options-' + id);
            if (activeOptions && activeOptions !== options) {
                activeOptions.classList.add('hidden');
            }
            options.classList.toggle('hidden');
            activeOptions = options.classList.contains('hidden') ? null : options;
        }

        document.addEventListener('click', function(event) {
            const target = event.target;
            const isInsideOptions = target.closest('.relative') !== null;
            if (!isInsideOptions && activeOptions) {
                activeOptions.classList.add('hidden');
                activeOptions = null;
            }
        });
    </script>

</x-layout>
