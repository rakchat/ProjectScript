<?php

session_start();

include("connection.php");

      $userid =  $_SESSION['userid'];
      $sql = "SELECT * FROM users WHERE user_id='$userid' ";
      $result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error($conn));
      $row = mysqli_fetch_array($result);
      extract($row);

?>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Shoes Shop</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css\manage_styles.css" />
    </head>
    <header class="header-top">
        <!--ชื่อร้านขายรองเท้า-->
    </header>
    <div class="menu-bar">
    <a href="logout.php" class="text-danger">Logout</a>
      <a href="#">|</a> 
      <div class="background">
        <a href="#"><?php echo $_SESSION['user']; ?></a> 
        <a href="#"> <img src= "photos/<?php echo $image; ?>" width="50" height="40" style="border-radius: 10px;" ></a> 
      </div>
      <a href="#">|</a> 
      <a href="#"> Contact </a> 

        <!-- <div class="dropdown">
            <img src="img/test.jpg" width="50px" height="50" style="border-radius: 50%;" onclick="userclick()" class="dropbtn">
            <div id="myDropdown" class="dropdown-content">
                <br>
                <a href="#">Manage My Account</a><br><br>
                <a href="#">Shopping Cart</a><br><br>
                <a href="#">My Orders</a><br><br>
                <a href="#">Log Out</a><br>
            </div>
        </div>
        <label for="username" style="font-size: 20px; color: white; float: right;">Hello Santi</label>
        <a href="#"> Contact </a>
        <div class="dropdown2">
            Brand
            <div class="dropdown-content2">
                <a href="#">Adidas</a><br>
                <a href="#">Nike</a><br>
                <a href="#">Vans</a><br>
                <a href="#">Converse</a><br>
            </div>
        </div> -->
        <script>
            /* When the user clicks on the button, 
        toggle between hiding and showing the dropdown content */
            function userclick() {
                document.getElementById("myDropdown").classList.toggle("show");
            }

            // Close the dropdown if the user clicks outside of it
            window.onclick = function(event) {
                if (!event.target.matches('.dropbtn')) {
                    var dropdowns = document.getElementsByClassName("dropdown-content");
                    var i;
                    for (i = 0; i < dropdowns.length; i++) {
                        var openDropdown = dropdowns[i];
                        if (openDropdown.classList.contains('show')) {
                            openDropdown.classList.remove('show');
                        }
                    }
                }
            }
        </script>
    </div>

    <body>

<form  method="POST" action="manage_user.php" enctype="multipart/form-data">
        <div class="content">
            <div class="row">
                <div class="col">
                    <h4 style="text-align: center;">Manage My Account</h4><br><br>
                    <center><img id="userimg" src="photos/<?php echo $image; ?>"><br><br>
                    <h6 style="text-align: center;">Change Image</h6>
                     <input type="file" class="form-control" name="image" id="image">
                        </center></br>

                </div>
                <div class="col">
                    <br><br><br>
                    <h6 style="text-align: center;">Personal Profile</h6><br>
                    <input type="hidden" class="form-control" name="user_id" value="<?php echo $userid; ?>" />
                    <label for="name">Name:</label><input type="text" id="name" name="name" value="<?php echo $fname . " " . $lname; ?>" disabled><br>
                    <label for="email">Email:</label><input type="text" id="email" value="<?php echo $email; ?>" disabled><br>
                    <label for="password">Password:</label><input type="password" id="inputPassword4" name="password" value="password" required><br><br><br><br>
                    <center><button type="submit" class="save" id="savebutton" onclick="Saveuser()">Save</button></center>
                </div>
                <div class="col">
                    <br><br><br>
                    <h6 style="text-align: center;">Address</h6><br>
                    <textarea id="address" name="address" placeholder="address" style="height: 120px; width: 250px; border-color:#C9C9C9; border-style: solid; border-radius: 10px; margin-left: 10%;"><?php echo htmlspecialchars($address); ?></textarea><br>
                    <label for="tel" style="margin-left: 10px;">Tel:</label><input type="text" id="tel" name="phone" value="<?php echo $phone; ?>"><br>
                    <div class="btn" style="margin-left: 50px;">

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


        </body>

        </html>
