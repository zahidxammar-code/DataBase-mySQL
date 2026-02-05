<?php

include "../header/config.php";
include "../header/header.php";

$halaman_aktif = basename($_SERVER['PHP_SELF']);



//ambil id dari URL
//kalau di URL ada id, simpan ke var $id
//kalau ga ada, isi var $id dengan null, jadi $id = null

$id= $_GET['id'] ?? null;
$success = false;

//ambil data id
if($id){
     $query = mysqli_query($koneksi, "SELECT * FROM tbl_admin WHERE id_admin ='$id'");
     $siswa = mysqli_fetch_assoc($query);
     //mysqli_fetch_assoc akan mengambil 1 baris data hasil dari query
}
//update

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $username = $_POST['username']?? '';
    $password = $_POST['password']?? '';
    $nama = $_POST['nama']?? '';
    $alamat = $_POST['alamat'] ;

    //folder upload/ lokasi tujuan foto
    $folder = "../../assets/img/";

    //ambil data
    if($_FILES['foto']['name'] !=""){

 
    $foto = $_FILES['foto']['name']; // ambil nama file
    $tmp = $_FILES['foto']['tmp_name']; // ambil lokasi sementara

    //pindahkan file 
    move_uploaded_file($tmp,$folder . $foto);

    //update photo

    $sql = "UPDATE tbl_admin SET username='$username', password ='$password', nama='$nama',alamat='$alamat',foto='$foto' WHERE id_admin='$id' ";

    }else{
     
    //update tanpa ganti foto
    $sql = "UPDATE tbl_admin SET username='$username', password ='$password', nama='$nama',alamat='$alamat' WHERE id_admin='$id' ";
    }

    $query = mysqli_query($koneksi, $sql);

     if($query){
    $success = true;
}
}
   

?>



<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
        
            <div class="card-body px-0 pt-0 pb-2">

<form class=" my-5 mx-5" method="POST" enctype="multipart/form-data">

    <h2 class="badge bg-gradient-warning ">EDIT <span>-DATA-</span>  SISWA</h2>
    <div class="form-group">
        <label for="example-text-input" class="form-control-label">Username</label>
        <input class="form-control" type="text" name="username" value="<?= $siswa['username']; ?>" id="example-text-input" required>
    </div>
    <div class="form-group">
        <label for="example-search-input" class="form-control-label">Password</label>
        <input class="form-control" type="text" name="password" value="<?= $siswa['password']; ?>" id="example-search-input" required >
    </div>
    <div class="form-group">
        <label for="example-email-input" class="form-control-label">Full name</label>
        <input class="form-control" type="text" name="nama" value="<?= $siswa['nama']; ?>" id="example-email-input" required>
    </div>
    <div class="form-group mb-5x">
        <label for="example-url-input" class="form-control-label">residence</label>
        <input class="form-control" type="text" name="alamat" value="<?= $siswa['alamat']; ?>" id="example-url-input"  required>
    </div>
    <div class="form-group mb-5x">
        <label for="example-url-input" class="form-control-label">photo</label>
        <input class="form-control" type="file" name="foto"    value="<?= $siswa['foto']; ?>" id="example-url-input" required >
    </div>
        <button type="submit" class="btn btn-primary btn-lg w-100">EDIT</button>
</form>

              </div>
            </div>
          </div>
        </div>
      </div>
</div>

<?php if($success){ ?>

<script>

Swal.fire({
  title: "Good job!",
  text: "your data is safe",
  icon: "success",
  timer: 2000,
  showConfirmButton : false
}) .then(() =>{
    window.location.href= "admin.php"
});
</script>
<?php } ?>