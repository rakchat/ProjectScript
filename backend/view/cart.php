<?php 
   session_start();

   include('../config/mysql.php');
   $db = new db();
   $con = $db->connectDB();
   $product = $db->selectAll($con,'shoes');
  // unset($_SESSION['cart']);

?>


<DOCTYPE html>

<html>

  <head>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous"> 
  </head>

  <body>



   <div class="container-fluid">
      <div class="row">
        <?php
          foreach ($product as $item) {
        ?>

        <div class="col-md-3 p-3 ">
          <div class="card shadow bg-body rounded">
            <img class="card-img-top" src="../resource/uploads/<?php echo $item['image1']; ?>">
            <div class="card-body">            
              <p class="card-title"><?php echo 'ราคา '.$item['price'].'. บาท'; ?></p>
              <form id="form_add_item_into_cart" action="shop.php" method="POST">
                <input type="hidden" value="<?php echo $item['shoes_id']; ?>" name="shoes_id">
                <input type="submit" class="btn btn-primary" value="add">
              </form>
            </div>
          </div>
        </div>

        <?php
         }
        ?>

      </div>
   </div>

     <script src="../resource/js/cart.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
 
  </body>

</html>