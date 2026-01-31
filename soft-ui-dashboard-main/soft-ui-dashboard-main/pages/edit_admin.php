<?php

include "config.php";

//ambil id dari URL
//kalau di URL ada id, simpan ke var $id
//kalau ga ada, isi var $id dengan null, jadi $id = null

$id= $_GET['id'] ?? null;

//ambil data id
if($id){
     $query = mysqli_query($koneksi, "SELECT * FROM tbl_admin WHERE id_admin ='$id'");
     $siswa = mysqli_fetch_assoc($query);
     //mysqli_fetch_assoc akan mengambil 1 baris data hasil dari query
}
//update

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $username = $_POST['username']?? 0;
    $password = $_POST['password']?? 0;
    $nama = $_POST['nama']?? 0;
    $alamat = $_POST['alamat'] ;

     mysqli_query($koneksi, "update tbl_admin set username= '$username', password='$password',nama='$nama',alamat='$alamat'  where id_admin = '$id'" );

     header("Location: siswa.php");
     exit;
}
   
include "header.php";
?>



<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
        
            <div class="card-body px-0 pt-0 pb-2">

<form class=" my-5 mx-5" method="POST">

    <h2 class="badge bg-gradient-warning ">EDIT <span>-DATA-</span>  SISWA</h2>
    <div class="form-group">
        <label for="example-text-input" class="form-control-label">Username</label>
        <input class="form-control" type="text" name="username" value="<?= $siswa['username']; ?>" id="example-text-input" >
    </div>
    <div class="form-group">
        <label for="example-search-input" class="form-control-label">Password</label>
        <input class="form-control" type="text" name="password" value="<?= $siswa['password']; ?>" id="example-search-input" >
    </div>
    <div class="form-group">
        <label for="example-email-input" class="form-control-label">Full name</label>
        <input class="form-control" type="text" name="nama" value="<?= $siswa['nama']; ?>" id="example-email-input" >
    </div>
    <div class="form-group mb-5x">
        <label for="example-url-input" class="form-control-label">residence</label>
        <input class="form-control" type="text" name="alamat"      value="<?= $siswa['alamat']; ?>" id="example-url-input"  >
    </div>
        <button type="submit" class="btn btn-primary btn-lg w-100">EDIT</button>
</form>

              </div>
            </div>
          </div>
        </div>
      </div>
</div>