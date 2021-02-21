<?php 

    session_start();

    if (isset($_POST['email'])) {

        include('connection.php');

        $username = $_POST['email'];
        // $password = $_POST['password'];
        $passwordenc = md5($_POST['password']);

        $query = "SELECT * FROM users WHERE email = '$username' AND password = '$passwordenc'";

        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 1) {

            $row = mysqli_fetch_array($result);

            $_SESSION['userid'] = $row['user_id'];
            $_SESSION['user'] = $row['fname'] . " " . $row['lname'];
            $_SESSION['photo'] = $row['image'];
            $_SESSION['userlevel'] = $row['status'];

            if ($_SESSION['userlevel'] == 'user') {
                header("Location: homepage.php");
            }

            if ($_SESSION['userlevel'] == 'manager') {
                header("Location: manager_page.php");
            }

            if ($_SESSION['userlevel'] == 'admin') {
                header("Location: admin_page.php");
            }


        } else {
            echo "<script>alert('User หรือ Password ไม่ถูกต้อง');</script>";
            echo "<script>window.location.href='form_login.php'</script>";
        }
    } else {
        header("Location: form_login.php");
    }


?>