<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $satu = Category::create([
            'name' => 'Makanan & Minuman',
            'slug' => 'makanan-dan-minuman',
        ]);

        $dua = Category::create([
            'name' => 'Buah & Sayur',
            'slug' => 'buah-dan-sayur',
        ]);

        $tiga = Category::create([
            'name' => 'Daging & Ikan',
            'slug' => 'daging-dan-ikan',
        ]);

        $empat = Category::create([
            'name' => 'Bumbu Dapur',
            'slug' => 'bumbu-dapur',
        ]);

        $lima = Category::create([
            'name' => 'Kesehatan & Kecantikan',
            'slug' => 'kesehatan-dan-kecantikan',
        ]);
        
        $enam = Category::create([
            'name' => 'Produk Bayi',
            'slug' => 'produk-bayi',
        ]);        

        $tujuh = Category::create([
            'name' => 'Perlengkapan Rumah',
            'slug' => 'perlengkapan-rumah',
        ]);
        
        $delapan = Category::create([
            'name' => 'Alat Tulis',
            'slug' => 'alat-tulis',
        ]);
        
        Product::factory(56)->recycle([
            $satu, $dua, $tiga, $empat, $lima, $enam, $tujuh, $delapan
       ])->create();


        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // User::create([
        //     'name' => 'Izzat',
        //     'username' => 'izzat12',
        //     'email' => 'izzat@gmail.com',
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('password'),
        //     'remember_token' => Str::random(10)
        // ]);

        // $izzat = User::create([
        //     'name' => 'Izzat',
        //     'username' => 'izzat12',
        //     'email' => 'izzat@gmail.com',
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('password'),
        //     'remember_token' => Str::random(10)
        // ]);

        // Category::create([
        //     'name' => 'web design',
        //     'slug' =>  'web design'
        // ]);

        // Post::create([
        //     'title' => 'judul artikel 1',
        //     'author_id' => 1,
        //     'category_id' => 1,
        //     'slug' => 'judul-artikel-1',
        //     'body' => 'Eloquent relationships are defined as methods on your Eloquent model classes. Since relationships also serve as powerful query builders, defining relationships as methods provides powerful method chaining and querying capabilities. For example, 
        //     we may chain additional query constraints on this posts 
        //     relationship'
        // ]);

        Product::factory(56)->recycle([
             $satu, $dua, $tiga, $empat, $lima, $enam, $tujuh
        ])->create();

    }
}
