<?php

session_start();

require_once "connection.php";

if (isset($_POST['submit'])) {

    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $image = $_POST['image'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $status = $_POST['status'];


    $user_check = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
    $result = mysqli_query($conn, $user_check);
    $user = mysqli_fetch_assoc($result);

    if ($user['email'] === $email) { //check email 
        echo "<script>alert('Username already exists');</script>";
        $_SESSION['error'] = "This E-mail is already registered.";
        header("Location: register.php");
    } else {
        $passwordenc = md5($password);

        //file
        $filename = uniqid() . "-" . time();
        $extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
        $basename = $filename . "." . $extension;
        $source = $_FILES["image"]["tmp_name"];
        $destination  = "./photos/{$basename}";
        //
        //file
        move_uploaded_file($source, $destination);
        //

        $query = "INSERT INTO users (fname, lname, email, password, image, phone, address, status)
                        VALUE ('$firstname', '$lastname', '$email', '$passwordenc', '$basename', '$phone', '$address', 'user')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $_SESSION['success'] = "Register completed successfully";
            header("Location: form_login.php");
        }
        // else {
        //     $_SESSION['error'] = "Something went wrong";
        //     header("Location: index.php");
        // }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shoes Shop</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css\register_styles.css" />
</head>
<header class="header-top">
    <!--ชื่อร้านขายรองเท้า-->
</header>
<div class="menu-bar">
    <a href="form_login.php">Login</a>
    <a href="register.php">Register</a>
    <a href="#"> Contact </a>
    <div class="dropdown">
        Brand
        <div class="dropdown-content">
            <a href="#">Adidas</a><br>
            <a href="#">Nike</a><br>
            <a href="#">Vans</a><br>
            <a href="#">Converse</a><br>
        </div>
    </div>
</div>

<body>

    <div class="container t">
        <div class="row justify-content-center m-3">
            <form method="post" enctype="multipart/form-data">

                <div class="col">
                    <?php if (isset($_SESSION['error'])) : ?>
                        <div class="error">
                            <?php
                            echo $_SESSION['error'];
                            ?>
                        </div>
                    <?php endif; ?>
                </div>

                <img src="img/user.png" style="width: 200px; height: 200px; margin-left: 50px; border-radius: 50%;">
                <br><br>
                <h1 style="color: black; padding-left: 70px;">Register</h1><br>

                <H5 style="color: black;">YOUR NAME</H5>
                <div class="mb-3">
                    <label for="fname" class="form-label">Firstname</label> <input type="text" class="form-control" name="fname" placeholder="Enter your Firstname" required>
                </div>
                <div class="mb-3">
                    <label for="lname" class="form-label">Lastname</label> <input type="text" class="form-control" name="lname" placeholder="Enter your Lastname" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone number</label> <input type="text" class="form-control" name="phone" placeholder="Enter your Phone number" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Address</label>
                    <textarea class="form-control" rows="4" cols="1" name="address" id="address" placeholder="Enter your Address"></textarea>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Images</label> <input type="file" class="form-control" name="image" id="image">
                </div>

                <H5 style="color: black;">LOGIN DETAILS</H5>

                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label> <input type="text" class="form-control" name="email" placeholder="Enter your E-mail" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label> <input type="password" class="form-control" name="password" placeholder="Enter your Password" required>
                </div>

                <div class="row justify-content-center">
                    <div class="col-4">
                        <button type="submit" id="submit" name="submit" class="btn btn-success">Register</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <form method="post">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-1 m-1">
                    <button type="submit" id="back" name="back" class="btn btn-warning">Back</button>
                </div>
            </div>
        </div>
    </form>

    <body>
        <div class="cartfooter">
            <div class="container">
                <div class="row">
                    <div class="col-8">
                        <h3>สมาชิก </h3><br>
                        1. B6122256 นายสุนทร รักชาติ<br>
                        2. นายอิบรอเฮ็ม บูละ<br>
                        3. B6122171 นายธิติพันธุ์ พอควร<br>
                        4. B6121785 นางสาวปนัดดา เบ็ดกระโทก<br>
                        5. B6122898 นายปิยพนธ์ พุ่มหมื่นไวย<br>
                    </div>
                    <div class="col-">
                        <h3>Contact </h3> <br>
                        E-mail: sixshoes@shop.com<br>
                        Phone: +66 826-5328<br>
                        Facebook: Sixshoes<br>
                        Development by Sixshoes@2021<br>
                        <br>
                    </div>
                </div>

    </body>

</html>

<?php
if (isset($_POST['back'])) {
    session_destroy();
    echo "<script>window.location.href='form_login.php'</script>";
}
?>