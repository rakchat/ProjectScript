<?php
   
   include('../backend/config/mysql.php');
   $db = new db();
   $con = $db->connectDB();

   $shoes_all = $db->selectALLJoinTwoTable($con,'shoes','brand_shoes','brand_id','brand_id');
    //$shoes_all = $db->query($con,'SELECT DISTINCT shoes.model, brand_shoes.brand_name FROM shoes INNER JOIN brand_shoes ON shoes.brand_id = brand_shoes.brand_id ');

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
   
    <a href="login-frontend/form_login.php">Login</a> 
    <a href="login-frontend/register.php">Register</a> 
    <a href="Contact.html"> Contact </a> 
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

    <div class="header">
        <div id="demo" class="carousel slide" data-ride="carousel">

            <!-- Indicators -->
            <ul class="carousel-indicators">
              <li data-target="#demo" data-slide-to="0" class="active"></li>
              <li data-target="#demo" data-slide-to="1"></li>
              <li data-target="#demo" data-slide-to="2"></li>
              <li data-target="#demo" data-slide-to="3"></li>
              <li data-target="#demo" data-slide-to="4"></li>
            </ul>
            
            <!-- The slideshow -->
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="image/banner.jpg" alt="Los Angeles" width="1100" height="500">
              </div>
              <div class="carousel-item ">
                <img src="image/banner2.jpg" alt="Chicago" width="1100" height="500">
              </div>
              <div class="carousel-item">
                <img src="image/banner3.jpg" alt="New York" width="1100" height="500">
              </div>
              <div class="carousel-item">
                <img src="image/banner4.jpg" alt="New York" width="1100" height="500">
              </div>
              <div class="carousel-item">
                <img src="image/banner5.jpg" alt="New York" width="1100" height="500">
              </div>
              
            </div>
            
            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
              <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
              <span class="carousel-control-next-icon"></span>
            </a>
          </div>
     </div>

     <div class="Search-box">
      <center>
        <i class="fa fa-search w3-large" > <b>Search</b> </i>  <input type="text" id="key_search"   placeholder="Search">  <i class="fa fa-shopping-cart" style="font-size:24px"></i>
        </center>
    </div>

     
    <div class="container">
      <div class="row">
        <?php 
         $queryBrand=$db->selectAll($con,'brand_shoes');
         foreach($queryBrand as $item){
        ?>
        <div class="col-md-2 shadow-lg p-3 mb-5 bg-white rounded btn_seach_form_brand" id="<?php echo $item['brand_id']; ?>"><img src="../backend/resource/uploads/<?php echo $item['logo']; ?>" class="w-100" style="height:100px;"></div>
        <?php } ?>
      </div>
    </div>

     <div class="container-fluid">
       <div class="row" id="box_view_all_product">
         <?php foreach($shoes_all as $item){ ?>
          <div class="col-md-3 m-5">
            <div class="card">
              <img src="../backend/resource/uploads/<?php echo $item['image1'] ?>" class="card-img-top p-2" alt="..." style="height:275px;">
              <div class="card-body">
               <center> <h5 class="card-title"><?php echo $item['brand_name']. " " . $item['model']; ?></h5></center>
               <center> <p style="color:gray;"><?php echo $item['price']. " Baht.";?></p></center>
               <form action="detailorder.php" method="GET">
                 <input type="hidden" value="<?php echo $item['shoes_id']; ?>" name="id">
                 <center><p><button type="submit">Add to Cart</button></p></center>
               </form>
              </div>
            </div>
          </div>
         <?php } ?>
       </div>
     </div>


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


  
<script src="./js/index.js"></script>
</body>
</html>
