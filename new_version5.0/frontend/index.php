<?php
   session_start();

   include('../backend/config/mysql.php');
   $db = new db();
   $con = $db->connectDB();

   $shoes_all = $db->selectALLJoinTwoTableOrderBy($con,'shoes','brand_shoes','brand_id','brand_id','shoes_id','DESC');
   $banner = $db->selectAll($con,'banner'); 
   $active_banner = true;
   $numUp = 0;
   $active_banner2 = true;
   //$shoes_all = $db->query($con,'SELECT DISTINCT shoes.model, brand_shoes.brand_name FROM shoes INNER JOIN brand_shoes ON shoes.brand_id = brand_shoes.brand_id ');

   if (!$_SESSION['userid']) {
       header("Location: index-non-login.php");
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
    <link rel="stylesheet" href="css\styles2.css" />
  </head>
<body>
  <header class="header-top"> 
    <!--ชื่อร้านขายรองเท้า-->
  </header>


   <?php include('./navbar_login.php') ?> 

    <div class="header">
        <div id="demo" class="carousel slide" data-ride="carousel">

            <!-- Indicators -->
            <ul class="carousel-indicators">
              <?php 
               foreach($banner as $item){
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
              <?php foreach($banner as $item){ ?>


                <?php if($active_banner2 == true){ ?>
                  <div class="carousel-item active">
                    <img src="../backend/resource/uploads/<?php echo $item['image']; ?>" alt="Los Angeles" width="1100" height="500">
                  </div>
                <?php
                    $active_banner2 = false; 
                    }else{ 
                ?>
                 <div class="carousel-item ">
                   <img src="../backend/resource/uploads/<?php echo $item['image']; ?>"alt="Chicago" width="1100" height="500">
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

     <div class="d-flex justify-content-center mt-5 mb-2">
        <div class="col-6">
          <div class="input-group" >
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-search w3-large" ></i></span>
              </div>
                <input type="text" class="form-control" id="key_search" placeholder="Search" aria-label="Username" aria-describedby="basic-addon1" style="height: 50px">
          </div>
        </div>  
    </div>

     <!-- ค้นหาด้วยโลโก -->
    <div class="container">
      <div class="row">
        <?php 
         $queryBrand=$db->selectAll($con,'brand_shoes');
         foreach($queryBrand as $item){
        ?>
        <div class="col-md-1 btn shadow-lg p-3 mb-1 bg-white rounded btn_seach_form_brand" id="<?php echo $item['brand_id']; ?>"><img src="../backend/resource/uploads/<?php echo $item['logo']; ?>" class="w-100" style="height:50px;"></div>
        <?php } ?>
      </div>
    </div>
    <!--  -->
    <hr>

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


     <?php
      include('footer.php');
    ?>
  
<script src="./js/index.js"></script>
</body>
</html>

<?php } ?>