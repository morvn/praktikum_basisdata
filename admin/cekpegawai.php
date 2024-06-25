<?php

//cek apakah user sudah login
if (!isset($_SESSION['username'])) {
    die("Anda belum login");
}

//cek level user
if ($_SESSION['level'] != "Pegawai") {
    die("Anda bukan Pegawai");
}

//aksi selanjutnya
