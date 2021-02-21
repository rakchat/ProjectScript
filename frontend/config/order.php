<?php

include('../../backend/config/mysql.php');
$db = new db();
$con = $db->connectDB();
$output = "";

if(isset($_POST['check_order_show_order_details'])){
    $id = $_POST['check_order_show_order_details'];
    $no = 0;
    //$query = $db->selectALLJoinTwoTableWhereOneColumn($con,'shopping_cart','orders','order_id','orders_id','orders_id',$id);
    $sql = "SELECT * FROM `shopping_cart`INNER JOIN shoes ON shopping_cart.shoes_id = shoes.shoes_id INNER JOIN orders ON shopping_cart.order_id = orders.orders_id INNER JOIN brand_shoes ON brand_shoes.brand_id = shoes.brand_id WHERE orders.orders_id = '$id' ";
    $query = $db->query($con,$sql);
    if($query){

        $output .= "<table class=\"table table-striped table-hover bg-white \">";
        $output .= "<tr>";
        $output .= "<th>ลำดับ</th>";
        $output .= "<th>รูปภาพ</th>";
        $output .= "<th>แบรนด์</th>";
        $output .= "<th>รุ่น</th>";
        $output .= "<th>สี</th>";
        $output .= "<th>ไซส์</th>";
        $output .= "<th>จำนวน</th>";
        $output .= "<th>ราคา</th>";
        $output .= "</tr>";
        foreach($query as $item){
            $no++;
            $output .= "<tr>";
            $output .= "<td>".$no."</td>";
            $output .= "<td><img src=\"../backend/resource/uploads/".$item['image1']."\" style=\"width:70px; height:50px;\"></td>";
            $output .= "<td>".$item['brand_name']."</td>";
            $output .= "<td>".$item['model']."</td>";
            $output .= "<td>".$item['color']."</td>";
            $output .= "<td>".$item['size']."</td>";
            $output .= "<td>".$item['amount']."</td>";
            $output .= "<td>".$item['total_price']."</td>";
            $output .= "</tr>";
        }

        $output .= "</table>";
        echo $output;

    }else{
        echo "No";
    }
}
?>