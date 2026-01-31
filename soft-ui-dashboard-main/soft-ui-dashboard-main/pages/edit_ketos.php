<?php

include "config.php";

//ambil id dari URL
//kalau di URL ada id, simpan ke var $id
//kalau ga ada, isi var $id dengan null, jadi $id = null

$id= $_GET['id'] ?? null;

//ambil data id
if($id){
     $query = mysqli_query($koneksi, "SELECT * FROM tbl_calon_ketua_osis WHERE id_calon ='$id'");
     $siswa = mysqli_fetch_assoc($query);
     //mysqli_fetch_assoc akan mengambil 1 baris data hasil dari query
}
//update

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $nama = $_POST['nama_calon']?? 0;
    $visi = $_POST['visi']?? 0;
    $misi = $_POST['misi']?? 0;
    $foto = $_POST['foto'] ;

     mysqli_query($koneksi, "update tbl_calon_ketua_osis set nama_calon='$nama', visi='$visi',misi='$misi',foto='$foto'  where id_calon = '$id'" );

     header("Location: calon_ketos.php");
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

    <h2 class="badge bg-gradient-warning ">TAMBAH <span>-DATA-</span> CALON-KETUA-OSIS</h2>
    <div class="form-group">
        <label for="example-text-input" class="form-control-label">Name</label>
        <input class="form-control" type="text"  value="<?= $siswa['nama_calon']; ?>" id="example-text-input" name="nama_calon">
    </div>
    <div class="form-group">
        <label for="example-search-input" class="form-control-label">Visi</label>
        <input class="form-control" type="text"  value="<?= $siswa['visi']; ?>" id="example-search-input" name="visi">
    </div>
    <div class="form-group">
        <label for="example-email-input" class="form-control-label">Misi</label>
        <input class="form-control" type="text"  value="<?= $siswa['misi']; ?>" id="example-email-input" name="misi">
    </div>
    <div class="form-group mb-5x">
        <label for="example-url-input" class="form-control-label">Predikat</label>
        <input class="form-control" type="text"  value="<?= $siswa['foto']; ?>" id="example-url-input"  name="foto">
    </div>
        <button type="submit" class="btn btn-primary btn-lg w-100">Edit</button>
</form>

              </div>
            </div>
          </div>
        </div>
      </div>
</div>