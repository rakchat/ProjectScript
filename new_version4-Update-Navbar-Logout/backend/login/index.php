<?php 

    session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <link rel="stylesheet" href="style1.css">

</head>
<body>

    <?php if (isset($_SESSION['success'])) : ?>
        <div class="success">
            <?php 
                echo $_SESSION['success'];
            ?>
        </div>
    <?php endif; ?>


    <?php if (isset($_SESSION['error'])) : ?>
        <div class="error">
            <?php 
                echo $_SESSION['error'];
            ?>
        </div>
    <?php endif; ?>

    <div class="container">
        <h1 align='left' class="mt-5">Login Page</h1>
        <hr>
        <form action="login.php" method="post">
            <div class="mb-3">
                <h6 align='left'><label for="username" class="form-label" >E-mail</label></h6>
                <input type="text"  class="form-control" name="email" placeholder="Email" required>
            </div>
            <div class="mb-3">
                <h6 align='left'><label for="password" class="form-label">Password</label></h6>
                <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>
                <div align='center'><button type="submit" name="submit" class="btn btn-success">Login</button> 
            </div>

        </form>
        <br>
        <div align='center'>
            <a href="register.php"> <button type="submit" name="submit" class="btn btn-primary">Go to register</button></a>
        </div>

    </div>
    <br>
    <br>
    
</body>
</html>

<?php 

    if (isset($_SESSION['success']) || isset($_SESSION['error'])) {
        session_destroy();
    }

?>