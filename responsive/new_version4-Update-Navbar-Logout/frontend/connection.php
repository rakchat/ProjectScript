<?php 

    $conn = mysqli_connect("localhost", "root", "", "dbscript");

    if (!$conn) {
        die("Failed to connec to databse " . mysqli_error($conn));
    }

?>