<?php
    session_start();
    include("connection.php");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/form_login_css.css">
</head>

<div class="menu-bar">
    <div class="background">
    <a href="form_login.php">Login</a> 
    <a href="#">|</a> 
    <a href="register.php">Register</a> 
    <a href="#">|</a> 
    <a href="contact-non-login.php"> Contact </a> 
    <a href="#">|</a>
    <a href="index-non-login.php">Home</a> 
    </div>
</div>

<body>

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
