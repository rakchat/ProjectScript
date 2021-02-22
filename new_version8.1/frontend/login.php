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
                header("Location: index.php");
            }

            if ($_SESSION['userlevel'] == 'manager') {
                $_SESSION['status'] = 'manager';
                    header("Location: ../backend/view/index-manager.php");
            }

            if ($_SESSION['userlevel'] == 'admin') {
                $_SESSION['status'] = 'admin';
                header("Location: ../backend/view/index-admin.php");
            }

            if ($_SESSION['userlevel'] == 'staff') {
                $_SESSION['status'] = 'staff';
                header("Location: ../backend/view/index-staff.php");
            }

        } else {
            echo "<script>alert('User หรือ Password ไม่ถูกต้อง');</script>";
            echo "<script>window.location.href='form_login.php'</script>";
        }
    } else {
        header("Location: form_login.php");
    }


?>