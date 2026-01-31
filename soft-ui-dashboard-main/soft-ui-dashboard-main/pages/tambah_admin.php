


<?php
include "header.php";
include "config.php";

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'] ;

    mysqli_query($koneksi, "INSERT INTO tbl_admin(username,password,nama,alamat)
VALUES ('$username','$password','$nama','$alamat')");

}

?>



<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
        
            <div class="card-body px-0 pt-0 pb-2">

<form class=" my-5 mx-5" method="POST">

    <h2 class="badge bg-gradient-warning ">TAMBAH <span>-DATA-</span> ADMIN</h2>
    <div class="form-group">
        <label for="example-text-input" class="form-control-label">Username</label>
        <input class="form-control" type="text" value="" id="example-text-input" name="username">
    </div>
    <div class="form-group">
        <label for="example-search-input" class="form-control-label">Password</label>
        <input class="form-control" type="text" value="" id="example-search-input" name="password">
    </div>
    <div class="form-group">
        <label for="example-email-input" class="form-control-label">Full name</label>
        <input class="form-control" type="text" value="" id="example-email-input" name="nama">
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