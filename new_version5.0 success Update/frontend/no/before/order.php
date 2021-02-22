<?php
  session_start();

  include('../backend/config/mysql.php');
  $db = new db();
  $con = $db->connectDB();

 if(isset($_POST['pro_id']) && isset($_SESSION['porduct'])){
    $check_lenght = 0;
    $pro_id = $_POST['pro_id'];
    $price = $_POST['get_price'];
    $amount = $_POST['get_amount'];
    $total_all_price = $_POST['get_all_total_price'];
    
    $date = date('Y-m-d');

    foreach($pro_id as $item){
        $check_lenght++;
    }

    $inserOrder = $db->query($con, "INSERT INTO `orders` (`orders_id`, `user_id`, `date`, `order_total_price`, `order_status`) VALUES (NULL, '1', '$date', '$total_all_price', 'ยังไม่ได้จัดส่ง')");

    if($inserOrder){
        $selectOrder = $db->query($con, "SELECT MAX(orders_id) FROM `orders` WHERE `user_id`= '1' AND `date` = '$date'");
        $fetchOrder = mysqli_fetch_array($selectOrder);
        $order_id = $fetchOrder['MAX(orders_id)']; 
        
        for($i = 0; $i < $check_lenght; $i++ ){
            $shoes_id = $pro_id[$i];
            $am = $amount[$i];
            $pr = $price[$i];
            $insertCart = $db->query($con, "INSERT INTO `shopping_cart` (`cart_id`, `order_id`, `shoes_id`, `amount`, `total_price`) VALUES (NULL, '$order_id', '$shoes_id', '$am', '$pr')");
            if($insertCart){
                unset($_SESSION['porduct'][$i]); 
            }
        }

        
    }
 }
  
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
    <link rel="stylesheet" href="css\orderstyles.css" />
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
<body class="orderbody">
<h2 class="textheader">My Order</h2>

  <table class="tableorder">
    <tr>
      <th class="orderno">Order ID</th>
      <th>Date</th>
      <th>Price</th>
      <th>Status</th>
    </tr>
    <?php
    $queryOrder = $db->selectALLJoinTwoTableWhereOneColumn($con,'orders','users','user_id','user_id','users.user_id','1');
    foreach ($queryOrder as $item) {
        ?>
    <tr>
      <td class="orderno"><?php echo $item['orders_id'];?></td> 
      <td><?php echo $item['date'];?></td>
      <td><?php echo $item['order_total_price'];?></td>
      <td><?php echo $item['order_status'];?></td>
    </tr>
    <?php
    } ?>
  </table>

    <div class="orderfooter">
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



