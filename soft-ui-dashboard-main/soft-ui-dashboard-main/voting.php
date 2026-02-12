<?php
include 'pages/header/config.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id_calonVar = $_POST['id_calon'] ?? 0;
    $tanggal_voteVar = date('Y-m-d H:i:s');

    //simpan voting
    $query = mysqli_query($koneksi, "INSERT INTO tbl_voting (id_calon, tanggal, id_siswa) VALUES ('$id_calonVar','$tanggal_voteVar', '0')");
}

?>