<?php 

    $conn = mysqli_connect("localhost", "root", "", "dblogin");

    if (!$conn) {
        die("Failed to connec to databse " . mysqli_error($conn));
    }

?>