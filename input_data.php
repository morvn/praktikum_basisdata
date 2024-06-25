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
                        <input name="jenistiket" type="text">
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
