# Web Volley

## Apakah ini?

Ini adalah contoh source code yang memungkinkan aplikasi Android mengakses data yang ada di database MySQL.

Aplikasi ini ditulis menggunakan PHP 7 dan dijalankan pada web server. Source code aplikasi ini digunakan pada buku **Mudah Membuat dan Berbisnis Aplikasi Android dengan Android Studio** yang ditulis oleh [Yudha Yudhanto](http://rumahstudio.com/) dan [Ardhi Wijayanto](http://senengcoding.blogspot.co.id/). Buku tersebut dapat diperoleh di toko buku [Gramedia](https://www.gramedia.com/products/mudah-membuat-dan-berbisnis-aplikasi-android-dengan-android-studio) ataupun toko buku lainnya.

## Yang dibutuhkan untuk menjalankan aplikasi ini

PHP 7

Mysql

Web server Apache

## Stuktur file

    ├── koneksi.php
    ├── README.md
    ├── send_data.php
    └── view_data.php

## Bagaimana cara mempergunakan source ini?

1. Unduh source code sebagai file zip dengan mengklik tombol Download ZIP atau clone melalui git dengan perintah

        git clone https://github.com/ardhiesta/volley_web

2. Copy folder yang berisi source code ke htdocs web server Apache

3. Buat database di MySQL dengan nama volley, kemudian buat tabel dengan nama products. Script untuk membuat tabel products adalah sebagai berikut

        CREATE TABLE `products` (
        `id` int(10) NOT NULL AUTO_INCREMENT,
        `nama` varchar(100) NOT NULL,
        `harga` decimal(10,2) NOT NULL,
        `deskripsi` text,
        `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
        `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (`id`)
        ) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;


4. Edit file koneksi.php, edit baris yang memuat

        // ganti username dengan username mysql anda, default : root
        define('DB_USER', "username");
        // ganti password dengan password mysql anda, default : "" (dikosongkan)
        define('DB_PASSWORD', "password");
        // nama database volley, ganti apabila anda memberi nama database yang berbeda
        define('DB_DATABASE', "volley");

5. Jalankan web server Apache

Selanjutnya aplikasi web Volley ini sudah dapat digunakan untuk kemudian digabungkan dengan aplikasi Android, source code aplikasi Android dapat dilihat di [Github](https://github.com/ardhiesta/buku-android01_volley)