<?php
include 'koneksi.php';

// Menyimpan data ke dalam variabel
$id_pembeli = $_POST['id_pembeli'];
$nama_pembeli = $_POST['nm'];
$ktp_pembeli = $_POST['ktp'];
$telp_pembeli = $_POST['almt'];
$id_jenistiket = $_POST['jenistiket'];

// Query untuk melakukan update data
$query_update = "UPDATE tb_pembeli SET
    nama_pembeli='$nama_pembeli',
    ktp_pembeli='$ktp_pembeli',
    telp_pembeli='$telp_pembeli',
    id_jenistiket='$id_jenistiket'
    WHERE id_pembeli='$id_pembeli'";

// Eksekusi query update
$result = mysqli_query($conn, $query_update);

// Check if the update was successful
if ($result) {
    // Redirect to tampil_data.php after successful update
    header("Location: tampil_data.php");
    exit(); // Ensure that no further code is executed after the redirect
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
