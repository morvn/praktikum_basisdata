<?php
include "koneksi.php";

$nama = $_POST['nama'];
$ktp = $_POST['ktp'];
$telp = $_POST['telp'];
$kode = $_POST['jenistiket'];

$query_inputan = "INSERT INTO tb_pembeli (nama_pembeli, ktp_pembeli, telp_pembeli, id_jenistiket) VALUES ('$nama', '$ktp', '$telp', '$kode')";

$hasil = mysqli_query($conn, $query_inputan);

if ($hasil) {
    // Jika pengisian sukses, alihkan kembali ke halaman "input_data.php"
    header("Location: tampil_data.php");
    exit();
} else {
    echo "Pengisian gagal";
}
?>
