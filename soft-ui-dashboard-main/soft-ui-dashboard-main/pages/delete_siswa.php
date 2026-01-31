<?php

include "config.php";

//ambil id dari URL
//kalau di URL ada id, simpan ke var $id
//kalau ga ada, isi var $id dengan null, jadi $id = null

$id= $_GET['id'] ?? null;

//ambil data id

//update
     mysqli_query($koneksi, "DELETE FROM tbl_siswa WHERE id_siswa='$id'" );

     header("Location: siswa.php");
     exit;