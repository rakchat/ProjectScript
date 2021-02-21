<?php
    session_start();
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
    <link rel="stylesheet" href="css\styles.css" />
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
      <a href="#">|</a>
      <a href="index.php">Home</a> 
  </div>
</div>
<body>
   

     
<div class="content-contact">
<h2 class="textcontact">Contact</h2>
<div class="container"> 
    <div class="row">
      <div class="col-8">    
        <br>
        <br>
        <i class="fa fa-facebook" style="font-size:32px"></i>   Sixshoes<br>
        <br>
        <br>
        <i class="fa fa-phone" style="font-size:36px"></i>  +668888888<br>
       <br>
       <br>
       <i class="fa fa-envelope" style="font-size:36px"></i> E-mail: sixshoes@shop.com<br>
       </div>
        <div class="col-">
          <h3 style="text-align: center;">OUR TEAM </h3> <br>
          B6121785 นางสาวปนัดดา เบ็ดกระโทก <br>
          B6122171 นายธิติพันธุ์ พอควร <br>
          B6122256 นายสุนทร รักชาติ  <br>
          B6122553 นายอิบรอเฮ็ม บูละ     <br>
          B6122898 นายปิยพนธ์ พุ่มหมื่นไวย <br>
          B6122942 นายสันติชัย ยะระสิทธิ์ <br>
          <br>
        </div>


    </div>
  </div>

</div>
</body>
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
      </div>
</div>
    <!-- ผู้ดูแลรระบบ -->
    <!-- Feature 1.ตกแต่ง -->

    <!-- เจ้าหน้าที่ -->
    <!-- Feature 1.รายงาน Report กราฟ -->

    <!-- ผู้ใช้ทั่วไป -->
    <!-- Feature 1.ตะกร้าสินค้า 2.Filter กรอง เรียง ราคา, สินค้ายอดนิยม, ดาว -->

    <!-- Update 20/1/2564 -->

</body>
</html>
