<?php
      include("../config/mysql.php");
      $db = new db();
      $con = $db->connectDB();
      $output = "";

      if(isset($_POST['check_cal_income'])){
          $from = $_POST['from'];
          $to = $_POST['to'];
          $no = 0;
          $sum = 0;
          $query = $db->query($con, "SELECT * FROM orders WHERE `date` BETWEEN '$from' AND '$to' "); 

          $output .= "<table class=\"table table-striped table-hover bg-white\">";
          $output .= "<tr>";
          $output .= "<th>ลำดับ</th>";
          $output .= "<th>วันที่</th>";
          $output .= "<th>ยอดเงิน</th>";
          $output .= "</tr>";

          foreach($query as $item){
              $no++;
              $sum += $item['order_total_price'];
              $output .= "<tr>";
              $output .= "<td>".$no."</td>";
              $output .= "<td>".$item['date']."</td>";
              $output .= "<td>".$item['order_total_price']."</td>";
              $output .= "</tr>";

          }

          $output .= "<tr>";
          $output .= "<td colspan=\"3\"><h5 class=\"text-danger\">ยอดรวมทั้งหมด:  ".$sum."<h5></td>";
          $output .= "</tr>";
          $output .= "</table>";

          if($no == 0){
              echo "<h5 class=\"text-danger\">ไม่มีข้อมูลตามวันที่นี้!</h5>";
          }else{
            echo $output;
          }

          

          
      }
?>