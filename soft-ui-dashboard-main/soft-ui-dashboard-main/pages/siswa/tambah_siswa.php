<?php
include "../header/header.php";
include "../header/config.php";

$halaman_aktif = basename($_SERVER['PHP_SELF']);

// $halaman_aktif = siswa.php
// $_SERVER['PHP_SELF'] = variable bawaan PHP yang berisikan alamat file yang sudah dibuka 
// basename() = adalah fungsi PHP untuk mengambil file saja dari sebuah path
// ambil alamat file sekarang -> ambil nama filenya saja


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $nama = $_POST['nama'] ?? 0;
    $kelas = $_POST['kelas'] ?? 0;
    $jurusan = $_POST['jurusan'] ?? 0;
    $alamat = $_POST['alamat'];
    $foto = $_POST['foto'];
    $mail = $_POST['mail'];

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
    move_uploaded_file($tmpFile, $folder . $namaBaru);

    $query = mysqli_query($koneksi, "INSERT INTO tbl_siswa(nama,kelas,jurusan,alamat,foto,mail)
VALUES ('$nama','$kelas','$jurusan','$alamat','$namaBaru','$mail')");

    if ($query) {
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

                        <h2 class="badge bg-gradient-warning ">TAMBAH <span>-DATA-</span> SISWA</h2>

                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Name</label>
                            <input class="form-control" type="text" value="" id="example-text-input" name="nama" required>
                        </div>

                        <div class="form-group">
                            <label for="example-search-input" class="form-control-label">Class</label>
                            <input class="form-control" type="text" value="" id="example-search-input" name="kelas" required>
                        </div>

                        <div class="form-group">
                            <label for="example-email-input" class="form-control-label">Major</label>
                            <input class="form-control" type="text" value="" id="example-email-input" name="jurusan" required>
                        </div>

                        <div class="form-group">
                            <label for="example-email-input" class="form-control-label">Residence</label>
                            <input class="form-control" type="text" value="" id="example-email-input" name="jurusan" required>
                        </div>

                        <div class="form-group mb-5x">
                            <label for="example-url-input" class="form-control-label">your photo</label>
                            <input class="form-control" type="file" value="" id="example-photo-input" name="foto" required>
                        </div>

                        <div class="form-group mb-5x">
                            <label for="example-url-input" class="form-control-label">E-mail</label>
                            <input class="form-control" type="email" value="" id="example-email-input" name="mail" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg w-100">ADD</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php if ($success) { ?>

    <script>
        Swal.fire({
            title: "Good job!",
            text: "your data is safe",
            icon: "success",
            showConfirmButton: false,
            timer: 2000
        }).then(() => {
            window.location.href = "siswa.php";
        });
    </script>

<?php } ?>