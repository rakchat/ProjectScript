<?php
      include("../config/mysql.php");
      $db = new db();
      $con = $db->connectDB();
      $output = "";

      if(isset($_POST['check_banner_update_image'])){
          $id = $_POST['edit_id'];
          $deleted = $_POST['check_banner_update_image'];

          //file
          $filename = uniqid() . "-" . time(); 
          $extension = pathinfo( $_FILES["image"]["name"], PATHINFO_EXTENSION ); 
          $basename = $filename . "." . $extension; 
          $source = $_FILES["image"]["tmp_name"];
          $destination  = "../resource/uploads/{$basename}";
          //

          $query = $db->query($con, "UPDATE `banner` SET `image` = '$basename' WHERE `banner`.`banner_id` = $id;");
          if($query){
             //check file delete
             if(file_exists("../resource/uploads/{$deleted}")){
                 unlink("../resource/uploads/{$deleted}");
             }
             move_uploaded_file( $source, $destination );


             $banner = $db->selectAll($con,'banner');

             foreach($banner as $item){
                 $output .= "<div class=\"col-md-10 m-3\">";
                 $output .= "<div class=\"card\">";
                 $output .= "<img src=\"../resource/uploads/".$item['image']."\" class=\"card-img-top\" alt=\"...\" style=\"with:100%; height: 300px;\">";
                 $output .= "<div class=\"card-body\">";
                 $output .= " <form id=\"form_update_banner\" action=\"../config/banner.php\" method=\"POST\" enctype=\"multipart/form-data\">";
                 $output .= "<p class=\"card-title\">เปลี่ยนรูปภาพ</p>";
                 $output .= "<input type=\"hidden\" name=\"check_banner_update_image\" value=\"". $item['image']."\">";
                 $output .= "<input type=\"hidden\" name=\"edit_id\" value=\"". $item['banner_id']."\">";
                 $output .= "<input type=\"file\" name=\"image\">";
                 $output .= "<hr>";
                 $output .= "<input type=\"submit\" value=\"บันทึก\" class=\"btn btn-primary\">";
                 $output .= "</form>";
                 $output .= "</div>";
                 $output .= "</div>";
                 $output .= "</div>";
             }

             echo $output;

          }

         
      }
?>