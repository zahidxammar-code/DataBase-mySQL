


<?php
include "header.php";
include "config.php";

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $nama = $_POST['nama_calon'];
    $visi = $_POST['visi'];
    $misi = $_POST['misi'];
    $foto = $_POST['foto'] ;

    mysqli_query($koneksi, "INSERT INTO tbl_calon_ketua_osis (id_calon, nama_calon, visi, misi, foto) 
VALUES (NULL, '$nama', '$visi', '$misi', '$foto');");

}

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
        <input class="form-control" type="text" value="" id="example-text-input" name="nama_calon">
    </div>
    <div class="form-group">
        <label for="example-search-input" class="form-control-label">Visi</label>
        <input class="form-control" type="text" value="" id="example-search-input" name="visi">
    </div>
    <div class="form-group">
        <label for="example-email-input" class="form-control-label">Misi</label>
        <input class="form-control" type="text" value="" id="example-email-input" name="misi">
    </div>
    <div class="form-group mb-5x">
        <label for="example-url-input" class="form-control-label">Predikat</label>
        <input class="form-control" type="text" value="" id="example-url-input"  name="foto">
    </div>
        <button type="submit" class="btn btn-primary btn-lg w-100">ADD</button>
</form>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>