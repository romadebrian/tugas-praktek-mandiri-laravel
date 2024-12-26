# WEB-CMS-Jamuindo

Content management system (CMS) untuk Web penjualan jamu <br>
project pertama saya menggunakan framework laravel <br>
Project ini menggunakan template SB Admin 2 dengan bootstrap v4.6.0

Admin <br>
username : admin@gmail.com <br>
password : admin123

Fitur

-   Login
-   Level Akun
-   Manajemen Postingan
-   Manajemen Produk
-   Manajemen Kategori
-   Manajemen User

Level Akses

-   Admin
    -   Akun Control
    -   Manajemen Post
    -   Manajemen Kategori
    -   Manajemen Product
-   Ediotr
    -   Manajemen Post
    -   Manajemen Kategori
    -   Manajemen Product

# Screenshot

## Beranda

<img src=https://github.com/romadebrian/tugas-praktek-mandiri-laravel/blob/main/Screenshot/home.png />

## Detail Post

<img src=https://github.com/romadebrian/tugas-praktek-mandiri-laravel/blob/main/Screenshot/detailpost.png />

## Post

<img src=https://github.com/romadebrian/tugas-praktek-mandiri-laravel/blob/main/Screenshot/news.png />

## Detail Produk

<img src=https://github.com/romadebrian/tugas-praktek-mandiri-laravel/blob/main/Screenshot/detailproduk.png />

## Produk

<img src=https://github.com/romadebrian/tugas-praktek-mandiri-laravel/blob/main/Screenshot/produk.png />

## Kategori

<img src=https://github.com/romadebrian/tugas-praktek-mandiri-laravel/blob/main/Screenshot/kategori.png />

## user

<img src=https://github.com/romadebrian/tugas-praktek-mandiri-laravel/blob/main/Screenshot/user.png />

# Run Project

git clone 'link project laravel github'

composer install

copy .env.example .env

php artisan key:generate

php artisan migrate:fresh --seed

artisan storage:link

php artisan serve

Go to link localhost:8000 OR 127.0.0.1:8000
