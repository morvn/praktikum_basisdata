<!DOCTYPE html>
<html>

<head>
    <title>Input Data</title>
</head>

<body>
    <center>
        <form action="input_data_post.php" method="POST">
            <table border="1">
                <tr>
                    <td>Nama</td>
                    <td>
                        <input name="nama" type="text" value="">
                    </td>
                </tr>

                <tr>
                    <td>No KTP</td>
                    <td>
                        <input name="ktp" type="text">
                    </td>
                </tr>

                <tr>
                    <td>Telp :</td>
                    <td>
                        <input name="telp" type="text">
                    </td>
                </tr>

                <tr>
                    <td>Kode Tiket :</td>
                    <td>
                        <select name="jenistiket">
                            <option value="">Pilih Jenis Tiket</option>
                            <?php
                            include 'koneksi.php';
                            $query_jenistiket = "SELECT * FROM tb_jenistiket";
                            $result_jenistiket = mysqli_query($conn, $query_jenistiket);
                            while ($row_jenistiket = mysqli_fetch_assoc($result_jenistiket)) {
                                echo '<option value="' . $row_jenistiket['id_jenistiket'] . '">' . $row_jenistiket['nama_jenistiket'] . '</option>';
                            }
                            ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input name="tombol" type="submit" value="Simpan">
                    </td>
                </tr>            
            </table>
        </form>
    </center>
</body>

</html>
