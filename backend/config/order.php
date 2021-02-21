<?php
    include("../config/mysql.php");
    $db = new db();
    $con = $db->connectDB();
    $output = "";

    if(isset($_POST['check_order_search'])){
        $id = $_POST['key'];
        $type = $_POST['type'];
        $query = $db->selectALLJoinTwoTableWhereLikeOneColumn($con,'orders','users','user_id','user_id',$type,$id);

        if($query){

            $output .= "<table class=\"table table-striped table-hover bg-white \">";
            $output .= "<tr>";
            $output .= "<th>วันที่สั่งซื้อ</th>";
            $output .= "<th>ผู้สั่งซื้อ</th>";
            $output .= "<th>ยอดชำระเงิน</th>";
            $output .= "<th>สถานะ</th>";
            $output .= "<th></th>";
            $output .= "</tr>";
            foreach($query as $item){
                $output .= "<tr>";
                $output .= "<td>". $item['date']."</td>";
                $output .= "<td>". $item['email']."</td>";
                $output .= "<td>". $item['order_total_price']."</td>";
                $output .= "<td>". $item['order_status']."</td>";
                $output .= "<td>";
                $output .= "<button class=\"btn btn-info btn_order_show_orders_details\" data-bs-toggle=\"modal\" data-bs-target=\"#order_modal_order_details\" id=\"".$item['orders_id']."\">รายละเอียดสั่งซื้อ</button>  ";
                $output .= "<button class=\"btn btn-warning btn_order_show_user_details\" data-bs-toggle=\"modal\" data-bs-target=\"#order_modal_user_details\" id=\"".$item['orders_id']."\">ข้อมูลลูกค้า</button>  ";
                $output .= "<button class=\"btn btn-success btn_order_show_update_status_order\" data-bs-toggle=\"modal\" data-bs-target=\"#order_modal_update_status\" id=\"".$item['orders_id']."\">อัพเดทสถานะ</button>  ";
                $output .= "</td>";
                $output .= "</tr>";
            }

            $output .= "</table>";
            echo $output;


        }else{
            echo "No";
        }

    }

    //SELECT * FROM `shopping_cart`INNER JOIN shoes ON shopping_cart.shoes_id = shoes.shoes_id INNER JOIN orders ON shopping_cart.order_id = orders.orders_id INNER JOIN brand_shoes ON brand_shoes.brand_id = shoes.brand_id

    if(isset($_POST['check_orders_update_status_order'])){
        $id = $_POST['orders_id'];
        $value = $_POST['status'];
        $query = $db->query($con, "UPDATE `orders` SET `order_status` = '$value' WHERE `orders`.`orders_id` = $id");
        if($query){
            $orderQuery = $db->selectALLJoinTwoTableOrderBy($con,'orders','users','user_id','user_id','orders_id','DESC');

            $output .= "<table class=\"table table-striped table-hover bg-white \">";
            $output .= "<tr>";
            $output .= "<th>วันที่สั่งซื้อ</th>";
            $output .= "<th>ผู้สั่งซื้อ</th>";
            $output .= "<th>ยอดชำระเงิน</th>";
            $output .= "<th>สถานะ</th>";
            $output .= "<th></th>";
            $output .= "</tr>";
            foreach($orderQuery as $item){
                $output .= "<tr>";
                $output .= "<td>". $item['date']."</td>";
                $output .= "<td>". $item['email']."</td>";
                $output .= "<td>". $item['order_total_price']."</td>";
                $output .= "<td>". $item['order_status']."</td>";
                $output .= "<td>";
                $output .= "<button class=\"btn btn-info btn_order_show_orders_details\" data-bs-toggle=\"modal\" data-bs-target=\"#order_modal_order_details\" id=\"".$item['orders_id']."\">รายละเอียดสั่งซื้อ</button>  ";
                $output .= "<button class=\"btn btn-warning btn_order_show_user_details\" data-bs-toggle=\"modal\" data-bs-target=\"#order_modal_user_details\" id=\"".$item['user_id']."\">ข้อมูลลูกค้า</button>  ";
                $output .= "<button class=\"btn btn-success btn_order_show_update_status_order\" data-bs-toggle=\"modal\" data-bs-target=\"#order_modal_update_status\" id=\"".$item['orders_id']."\">อัพเดทสถานะ</button>  ";
                $output .= "</td>";
                $output .= "</tr>";
            }

            $output .= "</table>";
            echo $output;


        }else{
            echo "No";
        }
    }

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
                $output .= "<td><img src=\"../resource/uploads/".$item['image1']."\" style=\"width:70px; height:50px;\"></td>";
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

    if(isset($_POST['check_order_user_order_details'])){
        $id = $_POST['check_order_user_order_details'];
        $query = $db->selectALLJoinTwoTableWhereOneColumn($con,'orders','users','user_id','user_id','users.user_id',$id);
        if($query){
            $user = mysqli_fetch_array($query);

            $output .= "<div class=\"row\">";
            
            $output .= "<div class=\"col-md-10\"><span class=\"alert\">ชื่อ-นามสกุล: ".$user['fname']." ".$user['lname']."</span></div>";
            $output .= "<div class=\"col-md-10\"><span class=\"alert\">อีเมล: ".$user['email']."</span></div>";
            $output .= "<div class=\"col-md-10\"><span class=\"alert\">โทรศัพท์: ".$user['phone']."</span></div>";
            $output .= "<div class=\"col-md-10\"><span class=\"alert\">ที่อยู่: ".$user['address']."</span></div>";

            $output .= "</div>";
            
            echo $output;
        }else{
            echo "NO";
        }


    }
?>