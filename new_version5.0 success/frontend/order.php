<?php
  session_start();

  include('../backend/config/mysql.php');
  $db = new db();
  $con = $db->connectDB();

  $user_id = $_SESSION['userid'];

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

    $inserOrder = $db->query($con, "INSERT INTO orders (`orders_id`, `user_id`, `date`, `order_total_price`, `order_status`) VALUES (NULL, '$user_id', '$date', '$total_all_price', 'ยังไม่ได้จัดส่ง')");

    if($inserOrder){
        $selectOrder = $db->query($con, "SELECT MAX(orders_id) FROM orders WHERE `user_id`= '$user_id' AND date = '$date'");
        $fetchOrder = mysqli_fetch_array($selectOrder);
        $order_id = $fetchOrder['MAX(orders_id)']; 
        
        for($i = 0; $i < $check_lenght; $i++ ){
            $shoes_id = $pro_id[$i];
            $am = $amount[$i];
            $pr = $price[$i];
            $insertCart = $db->query($con, "INSERT INTO shopping_cart (`cart_id`, `order_id`, `shoes_id`, `amount`, `total_price`) VALUES (NULL, '$order_id', '$shoes_id', '$am', '$pr')");
        }
        unset($_POST['pro_id']);
        unset($_SESSION['porduct']); 

        
    }
 }

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
    <link rel="stylesheet" href="css\orderstyles.css" />
</head>
      <header class="header-top"> 
      <!--ชื่อร้านขายรองเท้า-->
  </header>
  <?php include('./navbar_login.php') ?> 
  
<body class="orderbody">
<h2 class="textheader">My Order</h2>

  <table class="tableorder">
    <tr>
      <th>Order ID</th>
      <th>Date</th>
      <th>Price</th>
      <th>Status</th>
      <th></th>
    </tr>
    <?php 
    $queryOrder = $db->selectALLJoinTwoTableWhereOneColumnOrderByOne($con,'orders','users','user_id','user_id','users.user_id',$user_id,'orders_id','DESC');
    foreach ($queryOrder as $item) {
        ?>
    <tr>
      <td class="orderno"><?php echo $item['orders_id'];?></td> 
      <td><?php echo $item['date'];?></td>
      <td><?php echo $item['order_total_price'];?></td>
      <td><?php echo $item['order_status'];?></td>
      <td>
        <button class="btn btn-info btn_order_show_orders_details" data-toggle="modal" data-target="#order_modal_order_details" id="<?php echo $item['orders_id']; ?>">รายละเอียดสั่งซื้อ</button>
      </td>
    </tr>
    <?php
    } ?>
  </table>

    <div class="orderfooter">
      <div class="container"> 
        <?php
          include('footer.php');
        ?>
      </div>
    </div>

         <!-- ข้อมูลสั่งซื้อ -->
         <div class="fade modal" id="order_modal_order_details" data-backdrop="static">
            <div class="modal-dialog modal-xl">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 >รายละเอียดสั่งซื้อ</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div id="box_view_orders_order_details"></div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
         </div>

         <script src="js/order.js"></script>
</body>
</html>

<?php } ?>




