<nav class="navbar navbar-light justify-content-between fixed-top" style="background-color: black;">
  <a class="navbar-brand"><img src= "photos/logo/logo.png" width="50" height="40" style="border-radius: 10px; margin-left: 30px;" ></a>
  <div class="form-inline text-white mr-3 box_view_menu">
    <a href="index.php" class="p-3">Home</a> <span class="text-white"> | </span> 
    <a href="about.php" class="p-3">About</a> <span class="text-white"> | </span> 
    <a href="contact.php" class="p-3">Contact</a> <span class="text-white"> | </span> &nbsp;&nbsp;&nbsp;
    <img src= "photos/<?php echo $_SESSION['photo']; ?>" width="50" height="40" style="border-radius: 10px;" >
    <div class="dropdown">
      <button class="dropdown-toggle m-1 text-white" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-style: none; background-color: black;">
        
        <?php echo $_SESSION['user']; ?>
   </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="ManageAccount.php">Profile</a> 
        <a class="dropdown-item" href="shoppingcart.php">Cart</a> 
        <a class="dropdown-item" href="order.php">Orders</a>
        <a class="dropdown-item" href="logout.php">Logout</a>
      </div>
    </div>
</div>
</nav>
<br>
<br>
<br>