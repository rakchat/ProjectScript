<?php

session_start();

include("connection.php");

      $userid =  $_SESSION['userid'];
      $sql = "SELECT * FROM users WHERE user_id='$userid' ";
      $result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error($conn));
      $row = mysqli_fetch_array($result);
      extract($row);

      if (!$_SESSION['userid']) {
        header("Location: index-non-login.php");
    } else {

?>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Shoes Shop</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css\manage_styles1.css" />
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
        <div class="dropdown-content">
          <a href="#">แก้ไขข้อมูลส่วนตัว</a><br>
          <a href="#">ออเดอร์</a><br>
          <a href="#">ตะกร้าสินค้า</a><br>
        </div>
      </div>
      <a href="#">|</a> 
      <a href="contact.php"> Contact </a> 
      <a href="#">|</a>
      <a href="index.php">Home</a> 
  </div>


    <body>

<form  method="POST" action="manage_user.php" enctype="multipart/form-data">
        <div class="content">
            <div class="container-fluid">
            <div class="row">
                <div class="col-sm">
                    <h4 style="text-align: center;">Manage My Account</h4><br><br>
                    <center><img id="userimg" src="photos/<?php echo $image; ?>"><br><br>
                    <h6 style="text-align: center;">Change Image</h6>
                     <input type="file" class="form-control" name="image" id="image" required>
                        </center></br>

                </div>
                <div class="col-sm">
                    <br><br><br>
                    <h6 style="text-align: center;">Personal Profile</h6><br>
                    <input type="hidden" class="form-control" name="user_id" value="<?php echo $userid; ?>" />
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" class="form-control" value="<?php echo $fname . " " . $lname; ?>" disabled><br>
                    <label for="email">Email:</label>
                    <input type="text" id="email" class="form-control" value="<?php echo $email; ?>" disabled><br>
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="inputPassword4" name="password" required><br><br><br><br>
                    <center>
                    <button type="submit" class="btn btn-primary save" id="savebutton" class="" onclick="Saveuser()">Save</button>
                    <button class="btn btn-warning" id="btn_back">BACK</button>
                    </center>
                </div>
                
                <div class="col-sm">
                    <br><br><br>
                    <h6 style="text-align: center;">Address</h6><br>
                    <textarea id="address" name="address" placeholder="address"  class="form-control" style="height: 120px; width: 250px; border-color:#C9C9C9; border-style: solid; border-radius: 10px; margin-left: 10%;"><?php echo htmlspecialchars($address); ?></textarea><br>
                    <label for="tel" style="margin-left: 10px;">Tel:</label>
                    
                    <input type="text" class="form-control" id="tel" name="phone" value="<?php echo $phone; ?>"><br>
                    
                    <div class="btn" style="margin-left: 50px;">
                    </div>

                </div>
            </div>
            </div>
        </div>
        </form>



        <body>
            <div class="footer">
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

                    <script>
                    
                    $(document).ready(function(){

                        $('#btn_back').click(function(){
                            window.location.href='index.php';
                        });

                    });

                    </script>


        </body>

        </html>

        <?php } ?>
