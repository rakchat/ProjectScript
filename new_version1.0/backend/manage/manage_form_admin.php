<?php
  session_start();
  include("connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous"> 
    <title>Manage</title>
</head>
<body>
  <?php
      $userid =  $_SESSION['userid'];
      $sql = "SELECT * FROM users WHERE user_id='$userid' ";
      $result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());
      $row = mysqli_fetch_array($result);
      extract($row);
  ?>
  <br>
    <h3 style="text-align: center;">แก้ไขข้อมูล</h3>

    <form  method="POST" action="manage-admin.php" enctype="multipart/form-data">
    <div class="d-flex justify-content-center">
    <div class="row justify-content-center m-3">
        <div class="form-row">
        <div class="form-group">
                <label for="inputEmail4">ID</label>
                <input type="text" class="form-control" name="user_id" value="<?php echo $userid; ?>" disabled='disabled'/>
                <input type="hidden" class="form-control" name="user_id" value="<?php echo $userid; ?>" />
              </div>
            <div class="form-group">
                <label for="inputEmail4">Firstname</label>
                <input type="text" class="form-control" name="fname" value="<?php echo $fname; ?>" disabled>
              </div>
              <div class="form-group">
                <label for="inputEmail4">Lastname</label>
                <input type="text" class="form-control" name="lname" value="<?php echo $lname; ?>" disabled>
              </div>
          <div class="form-group">
            <label for="inputEmail4">Email</label>
            <input type="text" class="form-control" name="email" value="<?php echo $email; ?>" disabled>
          </div>
          <div class="form-group">
            <label for="inputPassword4">Password</label>
            <input type="password" class="form-control" id="inputPassword4" placeholder="Password" name="password" required>
          </div>
          <div class="form-group">
            <label for="inputEmail4">Phone number</label>
            <input type="text" class="form-control" name="phone" value="<?php echo $phone; ?>">
          </div>
  
        <div class="form-group">
          <label for="inputAddress">Address</label>
          <input type="text" class="form-control" id="inputAddress" name="address" value="<?php echo $address; ?>">
        </div>
        <div class="form-group col-md-8">
        <label for="exampleFormControlFile1">Your image</label><br>
            <p><img src="../../frontend/photos/<?php echo $image ?>" style="width:100px;height:100"><br>
            <label for="exampleFormControlFile1">Change image</label>
            <input type="file" class="form-control" name="image" id="image" required>
            </p>
          </div>
          </div>
  <br>
</div>
</div>
  <center>
        <button type="submit" class="btn btn-warning">Save</button>
        <a href="../view/index-manager.php"><button type="button" class="btn btn-danger">Back</button></a> 
</center>

      </form>
      <br>
      <br>
      <br>
</body>
</html>
