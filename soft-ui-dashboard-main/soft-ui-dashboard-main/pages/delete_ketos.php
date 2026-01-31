<?php

include "config.php";

//ambil id dari URL
//kalau di URL ada id, simpan ke var $id
//kalau ga ada, isi var $id dengan null, jadi $id = null

$id= $_GET['id'] ?? null;

//ambil data id

//update
     mysqli_query($koneksi, "DELETE FROM tbl_calon_ketua_osis WHERE id_calon='$id'" );

     header("Location: calon_ketos.php");
     exit;