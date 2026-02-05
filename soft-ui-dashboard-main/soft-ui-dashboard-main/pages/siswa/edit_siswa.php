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
     $query = mysqli_query($koneksi, "SELECT * FROM tbl_siswa WHERE id_siswa ='$id'");
     $siswa = mysqli_fetch_assoc($query);
     //mysqli_fetch_assoc akan mengambil 1 baris data hasil dari query
}
//update

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $nama = $_POST['nama']?? 0;
    $kelas = $_POST['kelas']?? 0;
    $jurusan = $_POST['jurusan']?? 0;
    $alamat = $_POST['alamat'] ;
    $mail = $_POST['mail'] ;

     //folder upload/ lokasi tujuan foto
    $folder = "../../assets/img/";

    //ambil data
    if($_FILES['foto']['name'] !=""){

 
    $foto = $_FILES['foto']['name']; // ambil nama file
    $tmp = $_FILES['foto']['tmp_name']; // ambil lokasi sementara

    //pindahkan file 
    move_uploaded_file($tmp,$folder . $foto);

    //update photo

    $sql = "UPDATE tbl_siswa SET nama= '$nama', kelas='$kelas', jurusan='$jurusan', alamat='$alamat', foto='$foto', mail='$mail'  WHERE id_siswa='$id' ";

    }else{
     
    //update tanpa ganti foto
    $sql = "UPDATE tbl_siswa SET nama= '$nama', kelas='$kelas',jurusan='$jurusan',alamat='$alamat' ,mail='$mail' WHERE id_siswa='$id' ";
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
        <label for="example-text-input" class="form-control-label">Name</label>
        <input class="form-control" type="text" name="nama" value="<?= $siswa['nama']; ?>" id="example-text-input" required >
    </div>
    <div class="form-group">
        <label for="example-search-input" class="form-control-label">Class</label>
        <input class="form-control" type="text"name="kelas"  value="<?= $siswa['kelas']; ?>" id="example-search-input" required >
    </div>
    <div class="form-group">
        <label for="example-email-input" class="form-control-label">Major</label>
        <input class="form-control" type="text" name="jurusan" value="<?= $siswa['jurusan']; ?>" id="example-email-input" required >
    </div>
    <div class="form-group mb-5x">
        <label for="example-url-input" class="form-control-label">residence</label>
        <input class="form-control" type="text" name="alamat"      value="<?= $siswa['alamat']; ?>" id="example-url-input" required  >
    </div>
    <div class="form-group mb-5x">
        <label for="example-url-input" class="form-control-label">photo</label>
        <input class="form-control" type="file" name="foto"      value="<?= $siswa['foto']; ?>" id="example-url-input"  required>
    </div>
    <div class="form-group mb-5x">
        <label for="example-url-input" class="form-control-label">E-mail</label>
        <input class="form-control" type="email" name="mail"      value="<?= $siswa['mail']; ?>" id="example-url-input" required  >
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
    window.location.href= "siswa.php"
});
</script>
<?php } ?>