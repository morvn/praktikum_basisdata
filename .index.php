<!DOCTYPE html>
<html>

<head>
    <title>Data Pembeli Tiket</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Sacramento&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container-fluid mt-4">
        <h2 class="title-text text-center mb-4">Data Pembeli Tiket</h2>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID Pembeli</th>
                        <th>Nama Pembeli</th>
                        <th>No. KTP Pembeli</th>
                        <th>No. Telepon Pembeli</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="table-body">
                    <?php
                    include 'koneksi.php';
                    $query = "SELECT * FROM tb_pembeli";
                    $result = mysqli_query($conn, $query);
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                            <td><?= $row['id_pembeli'] ?></td>
                            <td><?= $row['nama_pembeli'] ?></td>
                            <td><?= $row['ktp_pembeli'] ?></td>
                            <td><?= $row['telp_pembeli'] ?></td>
                            <td>
                                <a href="edit.php?id=<?= $row['id_pembeli'] ?>" class="btn btn-primary btn-sm">Edit</a>
                                <a href="hapus.php?id=<?= $row['id_pembeli'] ?>" class="btn btn-danger btn-sm ml-2">Hapus</a>
                            </td>
                        </tr>
                    <?php
                        $no++;
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="text-left">
            <a href="tambah.php" class="btn btn-success">Tambah Pembeli</a>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p>&copy; Evan Febitdya Pratama.</p>
        </div>
    </footer>
</body>

</html>
