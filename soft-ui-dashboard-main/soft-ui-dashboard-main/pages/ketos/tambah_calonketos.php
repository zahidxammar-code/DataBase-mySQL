


<?php
include "../header/header.php";
include "../header/config.php";


$halaman_aktif = basename($_SERVER['PHP_SELF']);

// $halaman_aktif = siswa.php
// $_SERVER['PHP_SELF'] = variable bawaan PHP yang berisikan alamat file yang sudah dibuka 
// basename() = adalah fungsi PHP untuk mengambil file saja dari sebuah path
// ambil alamat file sekarang -> ambil nama filenya saja

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $nama = $_POST['nama_calon'];
    $visi = $_POST['visi'];
    $misi = $_POST['misi'];
    $foto = $_POST['foto'];
    

    //folder upload/ lokasi tujuan foto
    $folder = "../../assets/img/";

    //ambil data
    $namaFile = $_FILES['foto']['name']; // ambil nama file
    $tmpFile  = $_FILES['foto']['tmp_name']; // ambil lokasi sementara


    // $$_FILES['foto']['name'];
    // $_FILES adalah variabel bawaan php untuk menampung data file yang di upload.
    // ['foto'] : name yg ada di form . ['name'] untuk mengambil nama asli file yang di-upload oleh user

    // bikin nama unik biar ga nabrak
    $namaBaru = time() . "_" . $namaFile;
    
    //pindahkan file 
    move_uploaded_file($tmpFile,$folder . $namaBaru);

    $query = mysqli_query($koneksi, "INSERT INTO tbl_calon (id_calon, nama_calon, visi, misi, foto) 
VALUES (NULL, '$nama', '$visi', '$misi' , '$namaBaru')");

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
                

<form class=" my-5 mx-5" method="POST"  enctype="multipart/form-data"><!-- enctype="multipart/form-data" = code untuk menjalankan foto -->

    <h2 class="badge bg-gradient-warning ">TAMBAH <span>-DATA-</span> CALON-KETUA-OSIS</h2>
    <div class="form-group">
        <label for="example-text-input" class="form-control-label">Name</label>
        <input class="form-control" type="text" value="" id="example-text-input" name="nama_calon" required>
    </div>
    <div class="form-group">
        <label for="example-search-input" class="form-control-label">Visi</label>
        <input class="form-control" type="text" value="" id="example-search-input" name="visi" required>
    </div>
    <div class="form-group">
        <label for="example-email-input" class="form-control-label">Misi</label>
        <input class="form-control" type="text" value="" id="example-email-input" name="misi" required>
    </div>
    <div class="form-group mb-5x">
        <label for="example-url-input" class="form-control-label">foto</label>
        <input class="form-control" type="file" value="" id="example-url-input"  name="foto" required>
    </div>
        <button type="submit" class="btn btn-primary btn-lg w-100">ADD</button>
</form>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>

<?php
if($success){ ?>

<script>

Swal.fire({
  title: "Good job!",
  text: "your data is safe",
  icon: "success",
  showConfirmButton : false,
  timer : 2000
}).then(()=>{
    window.location.href = "calon_ketos.php";
});

</script>

<?php }?>