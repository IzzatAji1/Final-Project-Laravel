<?php

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/products', function () {
    return view('products', [
        'title' => 'Product', 'products' => Product::latest()->paginate(9)->withQueryString()
    ]);
});

Route::get('/products/category/{category:slug}', function (Category $category) {
    // Mengambil produk terkait dengan kategori yang dipilih
    return view('products', [
        'title' => 'Category product: ' . $category->name,
        'products' => $category->products()->paginate(9), // Menyertakan paginasi jika perlu
    ]);
});


Route::resource('products', ProductController::class);



// Route::post('/products', [ProductController::class, 'store'])->name('products.store');


// Route::get('/categories/{category:slug}', function (Category $category) {
//     //$posts = $category->posts->load('category', 'author');

//     return view ('posts', ['title' => 'Articles in: ' . $category->name, 'posts' => $category->posts]);

// });

