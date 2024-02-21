<?php
$koneksi = mysqli_connect('localhost','root','','perpustakaan');

if (mysqli_connect_errno()){
    echo "koneksi database gagal : " ,mysqli_connect_error();
}// Pastikan fungsi dump() belum dideklarasikan sebelumnya
if (!function_exists('dump')) {
    function dump($var)
    {
        var_dump($var);
        die;
    }
}