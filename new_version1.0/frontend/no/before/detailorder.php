<?php

   session_start();

   $_SESSION['check'] = true;
   
   include('../backend/config/mysql.php');
   $db = new db();
   $con = $db->connectDB();

   
   $id = $_GET['id'];
   //$model = $_GET['model'];
   //$brand_name = $_GET['brand_name'];

   $shoes_all = $db->selectALLJoinTwoTableWhereOneColumn($con,'shoes','brand_shoes','brand_id','brand_id','shoes_id',$id);
  
   //$shoes_all = $db->selectALLJoinTwoTableWhereTwoColumn($con,'shoes','brand_shoes', 'brand_id','brand_id','shoes.model',$model, 'brand_shoes.brand_name',$brand_name);

//   $shoes_all = $db->selectALLJoinTwoTableWhereTwoColumn($con,'shoes','brand_shoes', 'brand_id','brand_id','shoes.model',$model, 'brand_shoes.brand_name',$brand_name);
   $item = mysqli_fetch_array($shoes_all);
//  $shoes_color = $db->query($con, "SELECT DISTINCT shoes.color FROM shoes INNER JOIN brand_shoes ON shoes.brand_id = brand_shoes.brand_id WHERE shoes.model = '$model' AND brand_shoes.brand_name = '$brand_name' ");
//   $shoes_size = $db->query($con, "SELECT DISTINCT shoes.size FROM shoes INNER JOIN brand_shoes ON shoes.brand_id = brand_shoes.brand_id WHERE shoes.model = '$model' AND brand_shoes.brand_name = '$brand_name' ")


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Shoes Shop</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css\styles.css" />
    <script type="text/javascript">
    function changeImg(imgID){
      if(imgID == 1) {
            document.getElementById("image1").innerHTML='<img src="./image/adidas.jpg" style="width:100%">';
            document.getElementById("image2").innerHTML='<img src="./image/Ultraboost_21_FY0377_05_standard.jpg" style="width:100%">';
            document.getElementById("image3").innerHTML='<img src="./image/Ultraboost_21_FY0377_06_standard.jpg" style="width:100%">';
            document.getElementById("image4").innerHTML='<img src="./image/Ultraboost_21_FY0377_41_detail.jpg" style="width:100%">';
            document.getElementById("image5").innerHTML='<img src="./image/adidas.jpg" style="width:100%">';
            document.getElementById("hid").value="./image/adidas.jpg";
            }else if(imgID == 2) {
            document.getElementById("image1").innerHTML='<img src="./image/black1.jpg" style="width:100%">';
            document.getElementById("image2").innerHTML='<img src="./image/black2.jpg" style="width:100%">';
            document.getElementById("image3").innerHTML='<img src="./image/black3.jpg" style="width:100%">';
            document.getElementById("image4").innerHTML='<img src="./image/black4.jpg" style="width:100%">';
            document.getElementById("image5").innerHTML='<img src="./image/black1.jpg" style="width:100%">';
            document.getElementById("hid").value="./image/adidas.jpg";
            }else if(imgID == 3) {
            document.getElementById("image1").innerHTML='<img src="./image/red1.jpg" style="width:100%">';
            document.getElementById("image2").innerHTML='<img src="./image/red2.jpg" style="width:100%">';
            document.getElementById("image3").innerHTML='<img src="./image/red3.jpg" style="width:100%">';
            document.getElementById("image4").innerHTML='<img src="./image/red4.jpg" style="width:100%">';
            document.getElementById("image5").innerHTML='<img src="./image/red1.jpg" style="width:100%">';
            document.getElementById("hid").value="./image/adidas.jpg";
            }
    }
      </script>
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
<body>
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
              <div class="carousel-item">
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

    <div class="content">
       <h2><?php echo $item['brand_name']. " " . $item['model']; ?></h2>
       <center>
           <div class="row" style="width:60%;">
               <div class="col-md-6 pr-1"><img src="../backend/resource/uploads/<?php echo $item['image1'];?>" class="w-100 mb-3" style="height: 360px;"></div>
               <div class="col-md-6 pl-1"><img src="../backend/resource/uploads/<?php echo $item['image1'];?>" class="w-100 mb-3" style="height: 360px;"></div>
               <div class="col-md-6 pr-1"><img src="../backend/resource/uploads/<?php echo $item['image1'];?>" class="w-100 mb-3" style="height: 360px;"></div>
               <div class="col-md-6 pl-1"><img src="../backend/resource/uploads/<?php echo $item['image1'];?>" class="w-100 mb-3" style="height: 360px;"></div>
           </div>
        </center>
        <div class="price-order">
        <p style="text-align: left;">Price : ฿<?php echo $item['price']; ?></p>
        </div>

        <div class="Choose-color">
            <p style="text-align: left;">Choose Color</p>
            <table >
                <tr>
                    <?php//foreach($shoes_color as $item1){?>
                    <td style="text-align:left; width: 100px;" ><img src="image/adidas.jpg"  style="width:100%" ></td>
                    <?php //} ?>
                </tr>
            </table>
        </div>
            
        <div class="Choose-size">
            <p style="text-align: left;">Choose Color</p>
            <?php //foreach($shoes_size as $item1){ ?>
            <button class="btn"> <?php// echo $item1['size'];?> </button>  
            <?php //} ?>
            </div>
            <div class="detail-shoes">
                <center>    
                    <table border="1" style="width: 70%;">
                    <tr>
                        <td style="padding-left: 10px; padding-right: 10px;"><p>Adidas Ultraboost
                            HIGH-PERFORMANCE SHOES FOR RUNNING IN THE HEAT.
                            Your run can't wait for cooler weather. It can't wait for the clouds to roll in or the rain to fall or the wind to blow. When the forecast calls for high temperatures as far as the eye can see, these running shoes are your go-to pair. A lightweight and breathable monofilament knit upper has transparent panels like windows open to a breeze. Responsive cushioning rides on a transparent outsole that adds to the icy-cool feel.</p></td>
                        <td><p  id="image5"><img src="image/adidas.jpg"  style="width:100%"><input type="hidden" id="hid" name="dd" value="./image/adidas.jpg">
                          
                        </td>
                        </tr>
                        
                    </table>
                </center>
            
                </div>
                
                <div>
                  <form method="get" action="shoppingcart.php">
                      <input type="hidden" value="<?php echo $item['shoes_id']; ?>" name="product">
                      <input type="submit" class="addcart" value="Add to Shopping Cart">
                  </form>
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
    <!-- ผู้ดูแลรระบบ -->
    <!-- Feature 1.ตกแต่ง -->

    <!-- เจ้าหน้าที่ -->
    <!-- Feature 1.รายงาน Report กราฟ -->

    <!-- ผู้ใช้ทั่วไป -->
    <!-- Feature 1.ตะกร้าสินค้า 2.Filter กรอง เรียง ราคา, สินค้ายอดนิยม, ดาว -->

    <!-- Update 20/1/2564 -->

</body>
</html>
