CREATE DATABASE db_toko;
USE db_toko;

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_produk VARCHAR(100) NOT NULL,
    harga DECIMAL(10,2) NOT NULL,
    deskripsi TEXT NOT NULL
);