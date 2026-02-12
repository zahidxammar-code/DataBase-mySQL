<?php

//session adalah tempat menyimpan data sementara di server untuk mengingat yang sedang login
session_start();

include "pages/header/config.php";

//jika tombol login di click

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['uname'] ;
    $password = $_POST['pass'] ;
//cek db
    $query = mysqli_query($koneksi, "select * from tbl_admin WHERE nama='$username' and password='$password' ");

    //kalau data nya ada maka 
    if(mysqli_num_rows($query) == 1 ){
        $key = mysqli_fetch_assoc($query);

        //simpan dalam session
        $_SESSION['nama'] = $key['nama'];
        $_SESSION['id_admin'] = $key['id_admin'];
        $_SESSION['id_admin'] = $key['id_admin'];


        //kalau login berhasil kita arahkan ke index.php
        echo "<script>
           alert('login berhasil'); 
           window.location='pages/dashboard/dasboard.php';
           </script>";
    } else {
        //login gagal
        echo "<script>
           alert('login gagal'); 
           window.location='login_admin.php';
           </script>";
    }



}




?>