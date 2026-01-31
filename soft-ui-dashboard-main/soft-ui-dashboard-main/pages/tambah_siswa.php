<?php
include "header.php";
include "config.php";

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $nama = $_POST['nama']?? 0;
    $kelas = $_POST['kelas']?? 0;
    $jurusan = $_POST['jurusan']?? 0;
    $alamat = $_POST['alamat'] ;

    mysqli_query($koneksi, "INSERT INTO tbl_siswa(nama,kelas,jurusan,alamat)
VALUES ('$nama','$kelas','$jurusan','$alamat')");

}

?>



<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
        
            <div class="card-body px-0 pt-0 pb-2">

<form class=" my-5 mx-5" method="POST">

    <h2 class="badge bg-gradient-warning ">TAMBAH <span>-DATA-</span>  SISWA</h2>
    <div class="form-group">
        <label for="example-text-input" class="form-control-label">Name</label>
        <input class="form-control" type="text" value="" id="example-text-input" name="nama">
    </div>
    <div class="form-group">
        <label for="example-search-input" class="form-control-label">Class</label>
        <input class="form-control" type="text" value="" id="example-search-input" name="kelas">
    </div>
    <div class="form-group">
        <label for="example-email-input" class="form-control-label">Major</label>
        <input class="form-control" type="text" value="" id="example-email-input" name="jurusan">
    </div>
    <div class="form-group mb-5x">
        <label for="example-url-input" class="form-control-label">residence</label>
        <input class="form-control" type="text" value="" id="example-url-input"  name="alamat">
    </div>
        <button type="submit" class="btn btn-primary btn-lg w-100">ADD</button>
</form>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>