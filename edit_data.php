<?php
include 'koneksi.php';

$kondisi = $_GET['id'];
$query_tampildata = "SELECT * FROM tb_pembeli WHERE id_pembeli='$kondisi'";
$hasiltampildata = mysqli_query($conn, $query_tampildata);
$row_edit = mysqli_fetch_array($hasiltampildata);
?>

<!DOCTYPE html>
<html>

<head>
    <title>EDIT DATA</title>
</head>

<body>

    <form method="POST" action="aksi_update.php">
        <input type="hidden" value="<?php echo $row_edit['id_pembeli']; ?>" name="id_pembeli">

        <table>
            <tr>
                <td>NAMA</td>
                <td>
                    <input type="text" name="nm" value="<?php echo $row_edit['nama_pembeli']; ?>">
                </td>
            </tr>
            <tr>
                <td>No KTP</td>
                <td>
                    <input type="text" value="<?php echo $row_edit['ktp_pembeli']; ?>" name="ktp">
                </td>
            </tr>
            <tr>
                <td>No Telp</td>
                <td>
                    <input type="text" name="almt" value="<?php echo $row_edit['telp_pembeli']; ?>">
                </td>
            </tr>
            <tr>
                <td>Kode Tiket</td>
                <td>
                    <select name="jenistiket">
                        <option value="">Pilih Jenis Tiket</option>
                        <?php
                        include 'koneksi.php';
                        $query_jenistiket = "SELECT * FROM tb_jenistiket";
                        $result_jenistiket = mysqli_query($conn, $query_jenistiket);
                        while ($row_jenistiket = mysqli_fetch_assoc($result_jenistiket)) {
                            $selected = ($row_jenistiket['id_jenistiket'] == $row_edit['kode_tiket']) ? 'selected' : '';
                            echo '<option value="' . $row_jenistiket['id_jenistiket'] . '" ' . $selected . '>' . $row_jenistiket['nama_jenistiket'] . '</option>';
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input name="tombol" type="submit" value="simpan">
                </td>
            </tr>
        </table>
    </form>

</body>

</html>
