# Final-Project-Laravel



## Gambaran Proyek
Proyek ini bertujuan untuk membuat sebuah website sederhana yang menampilkan produk-produk swalayan. Website ini akan memiliki dua komponen utama: produk dan kategori, 
dengan relasi one-to-many. Proyek ini juga mencakup operasi CRUD (Create, Read, Update, Delete) untuk mengelola produk dan kategori yang dapat langsung dilakukan melalui websitenya dengan interaksi langsung dengan databasenya.

<br>

## Fitur Utama:
- Tampilan produk-produk swalayan beserta kategorinya.
- Dua tabel utama dalam database: products dan categories.
- Seeder untuk mengisi data contoh menggunakan Faker.
- Operasi CRUD yang dilakukan pada websitenya.

<br>

## Struktur Tabel

1. - Tabel: Produk (products) 
   - Atribut:
      - id (Primary Key)
      - name (Nama produk)
      - category_id (Foreign key yang mengacu pada tabel categories)
      - stock (Jumlah produk yang tersedia)
      - expired_at (Tanggal kadaluarsa produk

<br>
     
2. - Tabel: Kategori (categories) 
   - Atribut:
      - id (Primary key)
      - name (Nama kategori)
      - slug (URL-friendly dari nama kategori)

<br>
     
## Relasi:
One-to-Many: Setiap produk hanya dapat memiliki satu kategori, sedangkan satu kategori dapat memiliki banyak produk.

<br>

## Langkah-Langkah Implementasi:
  1. Setup Database
     - Definisikan dua tabel (products dan categories) dengan atribut dan relasi yang sesuai.
     - Gunakan Laravel migrations untuk membuat tabel-tabel ini.
  
  <br>
  
  2. Model
     - Buat model Product dan Category.
     - Definisikan relasi belongsTo pada model Product dan relasi hasMany pada model Category.
       
  <br>
  
  3. Database Seeding dengan Faker
     - Gunakan fitur seeder Laravel untuk secara otomatis menghasilkan dan memasukkan data contoh ke dalam tabel products dan categories.
     - Gunakan Faker untuk membuat nama produk, stok, tanggal kadaluarsa, dan kategori secara acak.
  
  <br>
  
  4. Operasi CRUD dengan Artisan Tinker
     - Buat Controller: ProductController untuk mengelola CRUD produk.
     - Definisikan Route: Gunakan slug untuk operasi Create, Read, Update, dan Delete.
     - Implementasi CRUD:
        - Create: Tampilkan formulir dan simpan produk baru.
        - Read: Daftar dan detail produk berdasarkan slug.
        - Update: Edit produk dan perbarui informasi menggunakan slug.
        - Delete: Hapus produk berdasarkan slug.

       
  <br>
  
  5. Pengujian dan Pengembangan
     - Uji Seeder: Jalankan seeder untuk memverifikasi data kategori dan produk.
     - Uji CRUD: Uji fungsi Create, Read, Update, dan Delete melalui antarmuka.
     - Debugging: Perbaiki masalah yang muncul selama pengujian.


