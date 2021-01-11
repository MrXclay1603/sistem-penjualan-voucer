<?php

session_start();
    $id_produk = $_GET['id'];
    // echo var_dump($id_produk);
//jika produk sudah ditambah ke keranjang

if (isset($_SESSION['keranjang'][$id_produk])) {
    // code...
    ++$_SESSION['keranjang'][$id_produk];
} else {
    $_SESSION['keranjang'][$id_produk] = 1;
}
// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';
echo    "<script>alert('Produk Telah Masuk Ke Keranjang Belanja');</script>";
echo    "<script>location='index.php?page=keranjang';</script>";
