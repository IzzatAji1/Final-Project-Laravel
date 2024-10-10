# Final-Project-Laravel



## Gambaran Proyek
Proyek ini bertujuan untuk membuat sebuah website sederhana yang menampilkan produk-produk swalayan. Website ini akan memiliki dua komponen utama: produk dan kategori, 
dengan relasi one-to-many. Proyek ini juga mencakup operasi CRUD (Create, Read, Update, Delete) untuk mengelola produk dan kategori, yang akan dilakukan melalui php artisan 
tinker untuk interaksi langsung dengan database.

<br>

## Fitur Utama:
- Tampilan produk-produk swalayan beserta kategorinya.
- Dua tabel utama dalam database: products dan categories.
- Seeder untuk mengisi data contoh menggunakan Faker.
- Operasi CRUD akan dilakukan menggunakan php artisan tinker.

<br>

## Struktur Tabel

1. Tabel: Produk (products) <n>
   Atribut:
   - id (Primary Key)
   - name (Nama produk)
   - category_id (Foreign key yang mengacu pada tabel categories)
   - stock (Jumlah produk yang tersedia)
   - expired_at (Tanggal kadaluarsa produk
     
2. Tabel: Kategori (categories) <n>
   Atribut:
   - id (Primary key)
   - name (Nama kategori)
   - slug (URL-friendly dari nama kategori)

<br>
     
## Relasi:
One-to-Many: Setiap produk hanya dapat memiliki satu kategori, sedangkan satu kategori dapat memiliki banyak produk.
Langkah-Langkah Implementasi:

<br>


1. Setup Database
Definisikan dua tabel (products dan categories) dengan atribut dan relasi yang sesuai.
Gunakan Laravel migrations untuk membuat tabel-tabel ini.
2. Model
Buat model Product dan Category.
Definisikan relasi belongsTo pada model Product dan relasi hasMany pada model Category.
3. Database Seeding dengan Faker
Gunakan fitur seeder Laravel untuk secara otomatis menghasilkan dan memasukkan data contoh ke dalam tabel products dan categories.
Gunakan Faker untuk membuat nama produk, stok, tanggal kadaluarsa, dan kategori secara acak.
4. Operasi CRUD dengan Artisan Tinker
Lakukan operasi Create, Read, Update, dan Delete menggunakan php artisan tinker untuk pengujian cepat.
5. Pengujian dan Pengembangan
Uji seeder untuk memastikan data dimasukkan dengan benar.
Uji operasi CRUD menggunakan tinker untuk memastikan fungsionalitas.
