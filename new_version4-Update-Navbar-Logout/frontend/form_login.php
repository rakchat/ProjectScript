<?php
    session_start();
    include("connection.php");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/form_login_css.css">
</head>
<body>
  <div class="">
    <?php include('./navbar.php');?>
  </div>


    <div class="loginall">
        <div class="background_login">
            <img src="img/back6.jpg" id="back1">
        </div>

        <div class="login_form">
            <form action="login.php" method="post">

            <?php if (isset($_SESSION['success'])) : ?>
                <div class="success">
                    <?php 
                        echo $_SESSION['success'];
                    ?>
                </div>
            <?php endif; ?>

                <div class="mb-3">
                    <h6 align='left'><label for="username" class="form-label text-light" >E-mail</label></h6>
                    <input type="text"  class="form-control" name="email" placeholder="Email" required>
                </div>
                <div class="mb-3">
                    <h6 align='left'><label for="password" class="form-label text-light">Password</label></h6>
                    <input type="password" class="form-control" name="password" placeholder="Password" required>

                <div class="row justify-content-center">
                    <div class="col m-3">
                        <input type="hidden" value="1" name="check_insert"> <!-- Value check -->
                        <button type ="submit" id="submit" naem="submit" class="btn btn-success">Login</button>
                    </div>
                </div>
            </form>
        </div>

        <form method="post">
            <div class="row justify-content-center">
                        <div class="col">
                            <button type ="submit" id="register" name="register" class="btn btn-primary">Register</button>
                        </div>
                </div>
        </div>

    </div>

</body>
</html>

<?php 
        if (isset($_POST['register'])) {
            session_destroy();
            echo "<script>window.location.href='register.php'</script>";
        }
?>
