<?php
  session_start();

  include('../../backend/config/mysql.php');
  $db = new db();
  $con = $db->connectDB();
  $no = 0;

  $ouput = "";
  
  if(isset($_POST['check_detele_session'])){
      $id = $_POST['check_detele_session'];
      $check = 0;
      if(isset($_SESSION['porduct'])){
        foreach($_SESSION['porduct'] as $item){
            $check++;
        }
      }
      if($check == 1){
        unset($_SESSION['porduct']);
      }else{
        unset($_SESSION['porduct'][$id]);
      }
     
      $no = 0;



      if(isset($_SESSION['porduct'])){
        $ouput .= "<table class=\"tablecart\">";
        $ouput .= "<div class=\"cart\">";
        $ouput .= "<tr>";
        $ouput .= "<th class=\"cartno\" colspan=\"2\"></th>";
        $ouput .= "<th>Price</th>";
        $ouput .= "<th>Amount</th>";
        $ouput .= "<th class=\"cartno\" colspan=\"1\"></th>";
        $ouput .= "</tr>";
        $ouput .= "";
        foreach($_SESSION['porduct'] as $item){
            $product = $db->selectALLJoinTwoTableWhereOneColumn($con,'shoes','brand_shoes','brand_id','brand_id','shoes_id',$item);
            $pro_item = mysqli_fetch_array($product);
            $ouput .= "<tr>";
            $ouput .= "<td><img src=\"../backend/resource/uploads/".$pro_item['image1']."\" alt=\"\"></td>";
            $ouput .= "<td>". $pro_item['brand_name']." ".$pro_item['model']."</td>";
            $ouput .= "<td><span class=\"show_price\">".$pro_item['price']."</span></td>";
            $ouput .= "<td>";
            $ouput .= "<input type=\"hidden\" value=\"".$pro_item['shoes_id']."\" name=\"pro_id[]\">";
            $ouput .= "<input type=\"hidden\" value=\"". $pro_item['price']."\" class=\"price\">";
            $ouput .= "<input type=\"hidden\" name=\"get_price[]\" class=\"set_price\">";
            $ouput .= "<input type=\"number\" id=\"number\" class=\"amount\" value=\"1\" min=\"1\" onchange=\"calTotalPrice()\" max=\"".$pro_item['amount']."\" name=\"amount\"/>";
            $ouput .= "<input type=\"hidden\" name=\"get_amount[]\" class=\"set_amount\">";
            $ouput .= "</td>";
            $ouput .= "<td><a href=\"javascript:void(0)\" id=\"". $no."\" class=\"btn btn-danger btn_delete_session\">X</a></td>";
            $ouput .= "</tr>";
            $no++; 
        }
        $ouput .= "</table>";
        echo $ouput;
      }
      
  }

?>