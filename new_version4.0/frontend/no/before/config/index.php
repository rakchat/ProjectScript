<?php
  include('../../backend/config/mysql.php');
  $db = new db();
  $con = $db->connectDB();
  $output = "";

  if(isset($_POST['check_search_by_textbox'])){
      $key = $_POST['check_search_by_textbox'];
      $queryProduct = $db->query($con,"SELECT * FROM shoes INNER JOIN brand_shoes ON shoes.brand_id = brand_shoes.brand_id WHERE shoes.model LIKE '%$key%' OR brand_shoes.brand_name LIKE '%$key%'");
      if($queryProduct){
        foreach($queryProduct as $item){
            $output .= "<div class=\"col-md-3 m-5\">";
            $output .= "<div class=\"card\">";
            $output .= "<img src=\"../backend/resource/uploads/". $item['image1'] ."\" class=\"card-img-top p-2\" alt=\"...\" style=\"height:275px;\">";
            $output .= "<div class=\"card-body\">";
            $output .= "<center> <h5 class=\"card-title\">". $item['brand_name']. " " . $item['model']."</h5></center>";
            $output .= "<center> <p style=\"color:gray;\"".$item['price']. " Baht."."</p></center>";
            $output .= "<form action=\"detailorder.php\" method=\"GET\">";
            $output .= "<input type=\"hidden\" value=\"". $item['shoes_id']."\" name=\"id\">";
            $output .= "<center><p><button type=\"submit\">Add to Cart</button></p></center>";
            $output .= "</form>";
            $output .= "</div>";
            $output .= "</div>";
            $output .= "</div>";
        }

        echo $output;
      }
  }

  if(isset($_POST['check_search_by_brand_id'])){
    $key = $_POST['check_search_by_brand_id'];
    $queryProduct = $db->selectALLJoinTwoTableWhereOneColumn($con,'shoes','brand_shoes','brand_id','brand_id','shoes.brand_id',$key);
    if($queryProduct){
      foreach($queryProduct as $item){
          $output .= "<div class=\"col-md-3 m-5\">";
          $output .= "<div class=\"card\">";
          $output .= "<img src=\"../backend/resource/uploads/". $item['image1'] ."\" class=\"card-img-top p-2\" alt=\"...\" style=\"height:275px;\">";
          $output .= "<div class=\"card-body\">";
          $output .= "<center> <h5 class=\"card-title\">". $item['brand_name']. " " . $item['model']."</h5></center>";
          $output .= "<center> <p style=\"color:gray;\"".$item['price']. " Baht."."</p></center>";
          $output .= "<form action=\"detailorder.php\" method=\"GET\">";
          $output .= "<input type=\"hidden\" value=\"". $item['shoes_id']."\" name=\"id\">";
          $output .= "<center><p><button type=\"submit\">Add to Cart</button></p></center>";
          $output .= "</form>";
          $output .= "</div>";
          $output .= "</div>";
          $output .= "</div>";
      }

      echo $output;
    }
}

?>