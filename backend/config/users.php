<?php
      include("../config/mysql.php");
      $db = new db();
      $con = $db->connectDB();
      $output = "";

      if(isset($_POST['check_seach_users'])){
          $key = $_POST['key'];
          $type = $_POST['type'];
          $user_no = 0;
          $query = $db->selectWhereLikeByOneColumn($con,'user',$type,$key);

          if($query){
              $output .= "<table class=\"table table-striped table-hover bg-white\">";
              $output .= "<tr>";
              $output .= "<th>ลำดับ</th>";
              $output .= "<th>ชื่อ</th>";
              $output .= "<th>นามสกุล</th>";
              $output .= "<th>อีเมล</th>";
              $output .= "<th></th>";
              $output .= "</tr>";
              

            foreach($query as $item){
                $user_no++;
                $output .= "<tr>";
                $output .= "<td>". $user_no."</td>";
                $output .= "<td>".$item['fname']."</td>";
                $output .= "<td>".$item['lname']."</td>";
                $output .= "<td>".$item['email']."</td>";
                $output .= "<td>";
                $output .= "<button class=\"btn btn-info btn_users_show_details_users\" id=\"".$item['user_id']."\" data-bs-toggle=\"modal\" data-bs-target=\"#modal_users_show_details_users\">รายละเอียดเพิ่มติม</button>";
                $output .= "</td>";
                $output .= "</tr>";
            }

            $output .= "</table>";

            echo $output;

          }

      }

      if(isset($_POST['check_show_users_details_users'])){
          $id = $_POST['check_show_users_details_users'];
          $query = $db->selectWhereByOneColumn($con,'user','user_id',$id);

          if($query){
            $output .= "<div class=\"row\">";
            foreach($query as $item){
                $output .= "<div class=\"col-md-10\">ชื่อ: ".$item['fname']." ".$item['lname']."</div>";
                $output .= "<div class=\"col-md-10\">อีเมล: ".$item['email']."</div>";
                $output .= "<div class=\"col-md-10\">โทรศัพท์: ".$item['phone']."</div>";
                $output .= "<div class=\"col-md-10\">ที่อยู่: ".$item['address']."</div>";
            }
            $output .= "</div>";
            echo $output;

          }
      }


?>