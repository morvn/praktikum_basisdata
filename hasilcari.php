<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Cari Konsumen</title>
</head>
<body>
    <h4>Pencarian Data Konsumen</h4>
    <?php
    $pola = $_POST['nama-yang-dicari'];
    $sql = "SELECT * FROM tb_pembeli WHERE nama_pembeli LIKE '%$pola%'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 0) {
        echo "<h1>Data tidak ditemukan</h1><br>";
    } else {
        echo "<table border='1'>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>No KTP</th>
                    <th>No Telp</th>
                    <th>Jenis Tiket</th>
                </tr>
            </thead>
            <tbody>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>
                    <td>" . $row['nama_pembeli'] . "</td>
                    <td>" . $row['ktp_pembeli'] . "</td>
                    <td>" . $row['telp_pembeli'] . "</td>
                    <td>" . $row['id_jenistiket'] . "</td>
                  </tr>";
        }
        echo "</tbody>
            </table>";
    }
    mysqli_close($conn);
    ?>
</body>

</html>
