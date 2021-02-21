<?php  

  session_start();

  if( isset($_SESSION['check'])){
    if( $_SESSION['check']  == true && isset($_POST['product'])){
      $_SESSION['porduct'][] = $_POST['product'];
      $_SESSION['check']  = false;
    }
  }

  include('../backend/config/mysql.php');
  $db = new db();
  $con = $db->connectDB();
  $no = 0; 

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
    <link rel="stylesheet" href="css\cartstyles1.css" />
  </head>
      <header class="header-top"> 
      <!--ชื่อร้านขายรองเท้า-->
  </header>

  <?php include('./navbar_login.php') ?> 

<body class="cartbody">

<h2 class="textheader">Shopping Cart</h2>
<form action="order.php" method="post">
   <div class="box_view_cart" style="overflow-x:auto;">
   <table class="tablecart">
    <div class="cart">
    <tr>
        <th class="cartno" colspan="2"></th>
        <th>Price</th>
        <th>Amount</th>
        <th class="cartno" colspan="1"></th>
    </tr>

    <?php 

        if(isset($_SESSION['porduct'])){
         
         foreach($_SESSION['porduct'] as $key => $value){
         
         $product = $db->selectALLJoinTwoTableWhereOneColumn($con,'shoes','brand_shoes','brand_id','brand_id','shoes_id',$value);
         $pro_item = mysqli_fetch_array($product);
    ?>
        <tr>
            <td><img src="../backend/resource/uploads/<?php echo $pro_item['image1'];?>" alt="" width="200px" height="200px"></td>
            <td><?php echo $pro_item['brand_name']." ".$pro_item['model']; ?></td>
            <td><span class="show_price"><?php echo $pro_item['price'];?></span></td>
            <td>
                    <input type="hidden" value="<?php echo $pro_item['shoes_id'];?>" name="pro_id[]">
                    <input type="hidden" value="<?php echo $pro_item['price']; ?>" class="price">
                    <input type="hidden" name="get_price[]" class="set_price">
                    <input type="number" id="number" class="amount" value="1" min="1" onchange="calTotalPrice()" max="<?php echo $pro_item['amount']; ?>" name="amount"/>
                    <input type="hidden" name="get_amount[]" class="set_amount">
            </td>
            <td><a href="javascript:void(0)" id="<?php echo $key; ?>" class="btn btn-danger btn_delete_session">X</a></td>
        </tr>
    <?php 
    $no++; 
    }      
        }
    ?>  
    </table>
    </div>


    <div class="container">
        <div>
           <b>Total Price: </b> <input type="text" id="show_total" disabled>
        </div>
    </div>
      
      <input type="hidden" id="get_total_price" name="get_all_total_price">

      <center><input type="submit" class="bubbly-button" value="Add To Orders" onclick="calTotalPrice();"></center>

</form>
    <div class="cartfooter">
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
  <script src="./js/shoppingcart.js"></script>
</body>
</html>

<?php } ?>
