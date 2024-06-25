<?php
$conn = mysqli_connect("localhost", "root", "", "db_app_tiket");

if ($conn->connect_error) {
    die("Database Tidak Terkoneksi: " . $conn->connect_error);
} else {
    echo "";
}
