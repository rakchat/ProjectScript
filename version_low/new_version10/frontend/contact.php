<?php
    session_start();

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
    <link rel="stylesheet" href="css\styles.css" />
<body>
  <?php include('./navbar_login.php') ?> 
      
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

<?php
      include('footer.php');
?>

</body>
</html>

<?php } ?>
