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
            $extension = pathinfo( $_FILES["image"]["name"], PATHINFO_EXTENSION ); 
            $basename = $filename . "." . $extension; 
            $source = $_FILES["image"]["tmp_name"];
            $destination  = "./photos/{$basename}";
            //
            //file
            move_uploaded_file( $source, $destination );
            //
            
            $query = "INSERT INTO users (fname, lname, email, password, image, phone, address, status)
                        VALUE ('$firstname', '$lastname', '$email', '$passwordenc', '$basename', '$phone', '$address', '$status')";
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

                <!-- Start image header -->
                <img src="img/user.png" style="width: 200px; height: 200px; margin-left: 50px; border-radius: 50%;">
                <!-- End image header -->

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
                    <textarea  class="form-control" rows="4" cols="1" name="address" id="address" placeholder="Enter your Address"></textarea>
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

                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" class="form-control">
                        <option value="user" selected>User</option>
                        <option value="manager">Manager</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>

                <div class="row justify-content-center">
                        <div class="col-4">
                            <button type ="submit" id="submit" name="submit" class="btn btn-success">Register</button>
                        </div>
                </div>
            </form>
        </div>
    </div>

    <form method="post">
        <div class="container">
            <div class="row justify-content-center">
                        <div class="col-1 m-1">
                            <button type ="submit" id="back" name="back" class="btn btn-warning">Back</button>
                        </div>
                </div>
        </div>
    </form>

</html>

<?php 
        if (isset($_POST['back'])) {
            session_destroy();
            echo "<script>window.location.href='form_login.php'</script>";
        }
?>