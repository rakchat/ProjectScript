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
$banner = $db->selectAll($con,'banner'); 
$active_banner = true;
$numUp = 0;
$active_banner2 = true;
 
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
</head>
<body>
      <header class="header-top"> 
      <!--ชื่อร้านขายรองเท้า-->
  </header>

  <?php
    if (isset($_SESSION['userid'])) {
  ?>
    <?php include('./navbar_login.php') ?> 
  <?php
  } else {
  ?>
    <?php include('./navbar.php');?>
  <?php
  }
  ?>

    <div class="header">
        <div id="demo" class="carousel slide" data-ride="carousel">

            <!-- Indicators -->
            <ul class="carousel-indicators">
              <?php 
               foreach($banner as $item2){
              ?>

                <?php 
                 if($active_banner == true){
                   ?>
                   <li data-target="#demo" data-slide-to="<?php echo $numUp; ?>" class="active"></li>
                <?php
                    $active_banner = false;
                 }else{
                     ?>
                    <li data-target="#demo" data-slide-to="<?php echo $numUp; ?>"></li>
              <?php
                 }
               $numUp++;
               }
              ?>
            </ul>
            
            <!-- The slideshow -->
            <div class="carousel-inner">
              <?php foreach($banner as $item2){ ?>


                <?php if($active_banner2 == true){ ?>
                  <div class="carousel-item active">
                    <img src="../backend/resource/uploads/<?php echo $item2['image']; ?>" alt="Los Angeles" width="1100" height="500">
                  </div>
                <?php
                    $active_banner2 = false; 
                    }else{ 
                ?>
                 <div class="carousel-item ">
                   <img src="../backend/resource/uploads/<?php echo $item2['image']; ?>"alt="Chicago" width="1100" height="500">
                 </div>
              <?php
                }
              } 
             ?>

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

    <input type="hidden" value="<?php echo $id;?>" id="send_id_page">

    <div class="content">
       <h2 class="mb-5"><?php echo $item['brand_name']. " " . $item['model']; ?></h2>
       <center>
           <div class="row" style="width:60%;">
               <div class="col-md-6 pr-1"><img src="../backend/resource/uploads/<?php echo $item['image1'];?>" class="w-100 mb-3 shadow-lg bg-white rounded" style="height: 360px;"></div>
               <div class="col-md-6 pl-1"><img src="../backend/resource/uploads/<?php echo $item['image2'];?>" class="w-100 mb-3 shadow-lg bg-white rounded" style="height: 360px;"></div>
               <div class="col-md-6 pr-1"><img src="../backend/resource/uploads/<?php echo $item['image3'];?>" class="w-100 mb-3 shadow-lg bg-white rounded" style="height: 360px;"></div>
               <div class="col-md-6 pl-1"><img src="../backend/resource/uploads/<?php echo $item['image4'];?>" class="w-100 mb-3 shadow-lg bg-white rounded" style="height: 360px;"></div>
           </div>
        </center>
        
            <div class="container mb-4 mt-5">
              <hr>
              <div class="col-md-4 shadow-lg bg-white rounded p-4">
                <h5 class="text-left">
                  <b>Color: </b> <?php echo $item['color']; ?> 
                  <br>
                  <br>
                  <img src="../backend/resource/uploads/<?php echo $item['image1'];?>" style="width:70px; height:55px;">
                </h5>

                <h5 class="text-left">
                  <b>Size: </b>
                  <br>
                  <br>
                  <button class="btn btn-secondary"><?php echo $item['size']; ?></button>
                </h5>
                <h5 class="text-left">
                  <b>Price: </b>
                  <br>
                  <br>
                  ฿<?php echo $item['price']; ?> Baht.
                </h5>
              </div>
            </div>

            <div class="container mb-4 ">
              <h3 class="m-5">Product Description</h3>
              <div class="shadow-lg bg-white rounded p-5">
                <p class="text-left"><?php echo $item['star']; ?></p>
              </div>
            </div>

            <form id="add_shoes_to_cart" method="POST" action="shoppingcart.php">
                <input type="hidden" value="<?php echo $item['shoes_id']; ?>" name="product">
             </form>

        </div>
             <center>
                <div>
                  <button class="addcart" id="btn_check_user">Add to Shopping Cart</button>
                </div>
             </center>
    </div>
    
    <?php
      if(isset($_SESSION['userid'])){
    ?>
      <input type="hidden" id="value_user_id" value="1">
    <?php
      }else{
        ?>
       <input type="hidden" id="value_user_id" value="0">
    <?php
      }
    ?>

    <div class="modal fade" id="modal_login">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-header">Login</div>
          <div class="modal-body">
            <div>
              <form action="config/login.php" method="POST" id="form_login">
                  <input type="hidden" id="set_id_page" name="id_page">
                <div class="col-12">
                  <input type="text" name="email" placeholder="Email" class="form-control">
                </div>
                <br>
                <div class="col-12">
                  <input type="password" name="password" placeholder="Password" class="form-control">
                </div>
                <br>
                <div>
                </div>
              </form>
            </div>
          </div>
          <div class="modal-footer">
          <button class="btn bg-danger text-white" data-dismiss="modal">Cancel</button>
            <button class="btn bg-info text-white" id="btn_login">Login</button>
          </div>
        </div>
      </div>
    </div>

    
    
    
    
    <?php
      include('footer.php');
    ?>
   
 <script src="./js/detailorder.js"></script>
</body>
</html>
