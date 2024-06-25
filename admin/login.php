<?php

$error = "";

include("../koneksi.php");

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];

    $query_login = "SELECT * FROM tb_user WHERE username='$username' AND password='$password'";

    $result = mysqli_query($conn, $query_login);

    if (mysqli_num_rows($result) == 0) {
        $error = "Username atau Password tidak valid";
    } else {
        $row = mysqli_fetch_assoc($result);

        $_SESSION['username'] = $row['username'];
        $_SESSION['level'] = $row['level'];

        if ($row['level'] == "Administrator" && $level == 1) {
            header("Location: haladmin.php");
        } else if ($row['level'] == "Pegawai" && $level == 2) {
            header("Location: halpegawai.php");
        } else {
            $error = "Failed Login";
        }
    }
}
