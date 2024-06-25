<?php
include 'koneksi.php';

// Check if the ID parameter is set
if (isset($_GET['id'])) {
    // Get the ID parameter
    $id_pembeli = $_GET['id'];

    // Query to delete the record
    $query_delete = "DELETE FROM tb_pembeli WHERE id_pembeli='$id_pembeli'";

    // Execute the delete query
    $result = mysqli_query($conn, $query_delete);

    // Check if the delete was successful
    if ($result) {
        // Redirect to tampil_data.php after successful deletion
        header("Location: tampil_data.php");
        exit(); // Ensure that no further code is executed after the redirect
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    echo "Invalid ID parameter.";
}

// Close the database connection
mysqli_close($conn);
?>
