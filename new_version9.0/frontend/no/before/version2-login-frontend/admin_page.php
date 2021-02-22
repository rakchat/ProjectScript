<?php 

    session_start();

    if (!$_SESSION['userid']) {
        header("Location: form_login.php");
    } else {

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
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css\styles1.css" />
</head>
      <header class="header-top"> 
      <!--ชื่อร้านขายรองเท้า-->
  </header>
  <div class="menu-bar">
      <a href="logout.php" class="text-danger">Logout</a>
      <a href="#">|</a> 
      <div class="background">
        <a href="#"><?php echo $_SESSION['user']; ?></a> 
        <a href="#"> <img src= "photos/<?php echo $_SESSION['photo']; ?>" width="50" height="40" style="border-radius: 10px;" ></a> 
      </div>
      <a href="#">|</a> 
      <a href="#"> Contact </a> 
  </div>
<body>

      <div class="container">
        <div class="row justify-content-center">
            <p id="text1"><h1>Admin: <?php echo $_SESSION['user']; ?></h1> </p>
        </div>
        <div class="row justify-content-center">
            <img src= "photos/<?php echo $_SESSION['photo']; ?>"
        </div>
      </div>

</body>
</html>

<?php } ?>
