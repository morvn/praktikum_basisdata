<!DOCTYPE html>
<html>

<head>
    <title>Evan Febditya Pratama</title>
</head>

<body>

    <h2>Data Konsumen</h2>

    <!-- Search Form -->
    <form action="" method="GET">
        <label for="search">Cari Nama Konsumen:</label>
        <input type="text" name="search" id="search">
        <button type="submit">Cari</button>
    </form>

    <table border="1">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>No KTP</th>
            <th>No Telp</th>
            <th>Jenis Tiket</th>
            <th>Aksi</th>
        </tr>

        <?php
        include 'koneksi.php';

        // Check if search parameter is set
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            $query = "SELECT * FROM tb_pembeli WHERE nama_pembeli LIKE '%$search%'";
        } else {
            $query = "SELECT * FROM tb_pembeli";
        }

        $result = mysqli_query($conn, $query);
        $no = 1;

        while ($row = mysqli_fetch_assoc($result)) {
            $id_jenistiket = $row['id_jenistiket'];
            $query_jenistiket = "SELECT nama_jenistiket FROM tb_jenistiket WHERE id_jenistiket = $id_jenistiket";
            $result_jenistiket = mysqli_query($conn, $query_jenistiket);
            $row_jenistiket = mysqli_fetch_assoc($result_jenistiket);
        ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row['nama_pembeli'] ?></td>
                <td><?= $row['ktp_pembeli'] ?></td>
                <td><?= $row['telp_pembeli'] ?></td>
                <td><?= $row_jenistiket['nama_jenistiket'] ?></td>
                <td>
                    <a href="edit_data.php?id=<?= $row['id_pembeli'] ?>" class="btn btn-primary btn-sm">Edit</a>
                    <a href="aksideletedata.php?id=<?= $row['id_pembeli'] ?>" class="btn btn-danger btn-sm ml-2">Hapus</a>
                </td>
            </tr>
        <?php
        }
        ?>

        <!-- Add Data Button Row -->
        <tr>
            <td colspan="6">
                <form action="input_data.php" method="GET">
                    <button type="submit">Tambah Data</button>
                </form>
            </td>
        </tr>

    </table>

</body>

</html>