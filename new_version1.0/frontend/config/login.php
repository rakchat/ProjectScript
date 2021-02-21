<?php
  session_start();
  include('../connection.php');
  if(isset($_POST['email'])){
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $page = $_POST['id_page'];

    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $_SESSION['userid'] = $row['user_id'];
        $_SESSION['user'] = $row['fname'] . " " . $row['lname'];
        $_SESSION['photo'] = $row['image'];
        $_SESSION['userlevel'] = $row['status'];
        echo "1";

    } else {
        echo "0";
    }
  }



?>