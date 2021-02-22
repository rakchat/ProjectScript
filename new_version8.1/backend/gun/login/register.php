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


        $user_check = "SELECT * FROM user WHERE email = '$email' LIMIT 1";
        $result = mysqli_query($conn, $user_check);
        $user = mysqli_fetch_assoc($result);

        if ($user['email'] === $email) {
            echo "<script>alert('Username already exists');</script>";
            $_SESSION['error'] = "This E-mail is already registered.";
                header("Location: register.php");
        } else {
            $passwordenc = md5($password);

            $query = "INSERT INTO user (fname, lname, email, password, image, phone, address, status)
                        VALUE ('$firstname', '$lastname', '$email', '$passwordenc', '$image', '$phone', '$address', '$status')";
            $result = mysqli_query($conn, $query);

            if ($result) {
                $_SESSION['success'] = "Insert user successfully";
                header("Location: index.php");
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
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <link rel="stylesheet" href="style1.css">

</head>
<body>

    <?php if (isset($_SESSION['error'])) : ?>
        <div class="error">
            <?php 
                echo $_SESSION['error'];
            ?>
        </div>
    <?php endif; ?>
    <div class="container">
    <h1 align='left' class="mt-5">Register Page</h1>
        <hr>
        <form method="post">
            <div class="mb-3">
                <label for="fname" class="form-label">Firstname</label> <input type="text" class="form-control" name="fname" placeholder="Enter your Firstname" required>
            </div>
            <div class="mb-3">
                <label for="lname" class="form-label">Lastname</label> <input type="text" class="form-control" name="lname" placeholder="Enter your Lastname" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label> <input type="text" class="form-control" name="email" placeholder="Enter your E-mail" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label> <input type="text" class="form-control" name="password" placeholder="Enter your Password" required>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Images</label> <input type="file" class="form-control" name="image">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone number</label> <input type="text" class="form-control" name="phone" placeholder="Enter your Phone number" required>
            </div>
            <div class="mb-3">
                <textarea  class="form-control" rows="4" cols="50" name="address" id="address" placeholder="Enter your Address"></textarea>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" class="form-control">
                    <option value="user" selected>User</option>
                    <option value="manager">Manager</option>
                    <option value="admin">Admin</option>
                </select>
            </div>

            <!-- <label for="lname">Lastname</label> <input type="text" name="lname" placeholder="Enter your Lastname" required> -->
            <!-- <label for="email">E-mail</label> <input type="text" name="email" placeholder="Enter your E-mail" required> -->
            <!-- <label for="password">Password</label><input type="password" name="password" placeholder="Enter your password" required> -->
            <!-- <label for="image">Images</label> <input type="file" name="image" > -->
            <!-- <label for="phone">Phone number</label> <input type="text" name="phone" placeholder="Enter your Phone" required> -->
            <!-- <textarea rows="4" cols="50" name="address" id="address" placeholder="Enter your Address"></textarea> -->
            <!-- <select name="status">
                <option value="user" selected>User</option>
                <option value="manager">Manager</option>
                <option value="admin">Admin</option>
            </select> -->
            <br>
            <div align='center'><button type="submit" name="submit" class="btn btn-success">Register</button> 
            <!-- <input type="submit" name="submit" value="Submit"> -->
        </form>
        <br>
        <br>
        
    </div>

        <form method="post">
            <div align='center'><button type="submit" name="back" class="btn btn-primary">Back</button> 
            <!-- <input type="submit" name="back" value="Back"> -->
        </form>
        <br>
        <br>
    
</body>
</html>

<?php 
        if (isset($_POST['back'])) {
            session_destroy();
            echo "<script>window.location.href='index.php'</script>";
        }
    ?>