<?php 

   session_start();
   $_SESSION['cart'][] = $_POST['shoes_id'];

   include('../config/mysql.php');
   $db = new db();
   $con = $db->connectDB();
   
   
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
     <form>
     <?php
        foreach ($_SESSION['cart'] as $item) {
            echo $item;
            $getPro = $db->selectWhereByOneColumn($con,'shoes', 'shoes_id', $item);
            $product = mysqli_fetch_array($getPro);
      ?>

      <input type="text" value="<?php echo $product['model']; ?>" name="shoes[]"> </br>
      
      <?php

        }
      ?>
     <form>
   </div>

     <script src="../resource/js/cart.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
 
  </body>

</html>