<?php
  include("mysql.php");

  $db = new db();
  $con = $db->connectDB();
  $output = "";


  // update
  if(isset($_POST['check_edit_shoes_success'])){
   $shoes_id = $_POST['shoes_id'];
   $brand_id = $_POST['brand_id'];
   $model = $_POST['model'];
   $color = $_POST['color'];
   $size = $_POST['size'];
   $amount = $_POST['amount'];
   $price = $_POST['price'];
   $desciption = $_POST['desciption'];
   $image1 = "";
   $image2 = "";
   $image3 = "";
   $image4 = "";

   $name_image1 = $_POST['name_image1'];
   $name_image2 = $_POST['name_image2'];
   $name_image3 = $_POST['name_image3'];
   $name_image4 = $_POST['name_image4'];

   $file1 = $_FILES['file1']['name'];
   $file2 = $_FILES['file2']['name'];
   $file3 = $_FILES['file3']['name'];
   $file4 = $_FILES['file4']['name'];

   if(empty($file1)){
      $image1 = $name_image1;
   }else{
      //file 1
      $filename1 = uniqid() . "-" . time(); 
      $extension1 = pathinfo( $_FILES["file1"]["name"], PATHINFO_EXTENSION ); 
      $basename1 = $filename1 . "." . $extension1; 
      $source1 = $_FILES["file1"]["tmp_name"];
      $destination1  = "../resource/uploads/{$basename1}";

      $image1 = $basename1;
      move_uploaded_file( $source1, $destination1 );
      if(file_exists("../resource/uploads/{$name_image1}")){
        unlink("../resource/uploads/{$name_image1}");
      }

   }

   if(empty($file2)){
     $image2 = $name_image2;
   }else{
      //file 2
      $filename2 = uniqid() . "-" . time(); 
      $extension2 = pathinfo( $_FILES["file2"]["name"], PATHINFO_EXTENSION ); 
      $basename2 = $filename2 . "." . $extension2; 
      $source2 = $_FILES["file2"]["tmp_name"];
      $destination2  = "../resource/uploads/{$basename2}";

      $image2 = $basename2;
      move_uploaded_file( $source2, $destination2 );
      if(file_exists("../resource/uploads/{$name_image2}")){
        unlink("../resource/uploads/{$name_image2}");
      }
      
   }

   if(empty($file3)){
     $image3 = $name_image3;
   }else{
      //file 3
      $filename3 = uniqid() . "-" . time(); 
      $extension3 = pathinfo( $_FILES["file3"]["name"], PATHINFO_EXTENSION ); 
      $basename3 = $filename3 . "." . $extension3; 
      $source3 = $_FILES["file3"]["tmp_name"];
      $destination3  = "../resource/uploads/{$basename3}";   
      
      $image3 = $basename3;
      move_uploaded_file( $source3, $destination3 );
      if(file_exists("../resource/uploads/{$name_image3}")){
        unlink("../resource/uploads/{$name_image3}");
      }
   }

     if(empty($file4)){
      $image4 = $name_image4;
   }else{
      //file 4
      $filename4 = uniqid() . "-" . time(); 
      $extension4 = pathinfo( $_FILES["file4"]["name"], PATHINFO_EXTENSION ); 
      $basename4 = $filename4 . "." . $extension4; 
      $source4 = $_FILES["file1"]["tmp_name"];
      $destination4  = "../resource/uploads/{$basename4}";   
      
      $image4 = $basename4;
      move_uploaded_file( $source4, $destination4 );
      if(file_exists("../resource/uploads/{$name_image4}")){
        unlink("../resource/uploads/{$name_image4}");
      }
   }

   $query = $db->updateEleventColumn($con, 'shoes', 'brand_id', 'model', 'color', 'size', 'amount', 'price', 'star', 'image1', 'image2', 'image3', 'image4', $brand_id, $model, $color, $size, $amount, $price, $desciption, $image1, $image2, $image3, $image4, 'shoes_id', $shoes_id);

   if($query){
    
    $shoes = $db->selectALLJoinTwoTable($con,'shoes','brand_shoes','brand_id','brand_id');
    $no_shoes = 0;
    $output = "";
    $output .= "<table class=\"table table-striped table-hover bg-white\">";
    $output .= "<tr><th>ลำดับ</th><th>ชื่อแบรนด์</th><th>ชื่อรุ่น</th><th>ไซส์</th><th>สี</th><th></th></tr>";
    while($item_shoes = mysqli_fetch_array($shoes)) {
        $no_shoes++;
        $output .= "<tr>";  
        $output .= "<td>".$no_shoes."</td>";
        $output .= "<td>".$item_shoes['brand_name']."</td>";
        $output .= "<td>".$item_shoes['model']."</td>";
        $output .= "<td>".$item_shoes['size']."</td>"; 
        $output .= "<td>".$item_shoes['color']."</td>";
        $output .= "<td>";
        $output .= "<button class=\"btn btn-info btn_show_shoes_succes\" id=\"".$item_shoes['shoes_id']."\" data-bs-toggle=\"modal\" data-bs-target=\"#modal_show_details_shoes\">รายละเอียด</button> | ";
        $output .= "<button class=\"btn btn-warning btn_edit_shoes_success\" data-bs-toggle=\"modal\" data-bs-target=\"#edit_shoes_modal\" id=\"".$item_shoes['shoes_id']."\">แก้ไข</button> | ";
        $output .= "<button class=\"btn btn-danger btn_delete_shoes_success\" id=\"".$item_shoes['shoes_id']."\">ลบ</button> ";
        $output .= "</td>";
        $output .= "</tr>";
    }
    $output .= "</table>";
    echo $output;

   }
   
  }


  // search
  if(isset($_POST['check_search_shoes'])){
    $key = $_POST['key'];
    $type = $_POST['type'];
    if(empty($key)){
      $shoes = $db->selectALLJoinTwoTable($con,'shoes','brand_shoes','brand_id','brand_id');
      $no_shoes = 0;
      $output = "";
      $output .= "<table class=\"table table-striped table-hover bg-white\">";
      $output .= "<tr><th>ลำดับ</th><th>ชื่อแบรนด์</th><th>ชื่อรุ่น</th><th>ไซส์</th><th>สี</th><th></th></tr>";
      while($item_shoes = mysqli_fetch_array($shoes)) {
          $no_shoes++;
          $output .= "<tr>";  
          $output .= "<td>".$no_shoes."</td>";
          $output .= "<td>".$item_shoes['brand_name']."</td>";
          $output .= "<td>".$item_shoes['model']."</td>";
          $output .= "<td>".$item_shoes['size']."</td>"; 
          $output .= "<td>".$item_shoes['color']."</td>";
          $output .= "<td>";
          $output .= "<button class=\"btn btn-info btn_show_shoes_succes\" id=\"".$item_shoes['shoes_id']."\" data-bs-toggle=\"modal\" data-bs-target=\"#modal_show_details_shoes\">รายละเอียด</button> | ";
          $output .= "<button class=\"btn btn-warning btn_edit_shoes_success\" data-bs-toggle=\"modal\" data-bs-target=\"#edit_shoes_modal\" id=\"".$item_shoes['shoes_id']."\">แก้ไข</button> | ";
          $output .= "<button class=\"btn btn-danger btn_delete_shoes_success\" id=\"".$item_shoes['shoes_id']."\">ลบ</button> ";
          $output .= "</td>";
          $output .= "</tr>";
      }
      $output .= "</table>";
      echo $output;

    }else{

      $shoes = $db->selectALLJoinTwoTableWhereLikeOneColumn($con,'shoes','brand_shoes','brand_id','brand_id',$type,$key);
      $no_shoes = 0;
      $output = "";
      $output .= "<table class=\"table table-striped table-hover bg-white\">";
      $output .= "<tr><th>ลำดับ</th><th>ชื่อแบรนด์</th><th>ชื่อรุ่น</th><th>ไซส์</th><th>สี</th><th></th></tr>";
      while($item_shoes = mysqli_fetch_array($shoes)) {
          $no_shoes++;
          $output .= "<tr>";  
          $output .= "<td>".$no_shoes."</td>";
          $output .= "<td>".$item_shoes['brand_name']."</td>";
          $output .= "<td>".$item_shoes['model']."</td>";
          $output .= "<td>".$item_shoes['size']."</td>"; 
          $output .= "<td>".$item_shoes['color']."</td>";
          $output .= "<td>";
          $output .= "<button class=\"btn btn-info btn_show_shoes_succes\" id=\"".$item_shoes['shoes_id']."\" data-bs-toggle=\"modal\" data-bs-target=\"#modal_show_details_shoes\">รายละเอียด</button> | ";
          $output .= "<button class=\"btn btn-warning btn_edit_shoes_success\" data-bs-toggle=\"modal\" data-bs-target=\"#edit_shoes_modal\" id=\"".$item_shoes['shoes_id']."\">แก้ไข</button> | ";
          $output .= "<button class=\"btn btn-danger btn_delete_shoes_success\" id=\"".$item_shoes['shoes_id']."\">ลบ</button> ";
          $output .= "</td>";
          $output .= "</tr>";
      }
      $output .= "</table>";
      echo $output;
     // echo $type;
    }
  }

  //insert
  if(isset($_POST['check_insert_shoes_success'])){
    //file 1
    $filename1 = uniqid() . "-" . time(); 
    $extension1 = pathinfo( $_FILES["file1"]["name"], PATHINFO_EXTENSION ); 
    $basename1 = $filename1 . "." . $extension1; 
    $source1 = $_FILES["file1"]["tmp_name"];
    $destination1  = "../resource/uploads/{$basename1}";

    //file 2
    $filename2 = uniqid() . "-" . time(); 
    $extension2 = pathinfo( $_FILES["file2"]["name"], PATHINFO_EXTENSION ); 
    $basename2 = $filename2. "." . $extension2; 
    $source2 = $_FILES["file2"]["tmp_name"];
    $destination2  = "../resource/uploads/{$basename2}";
    
    //file 3
    $filename3 = uniqid() . "-" . time(); 
    $extension3 = pathinfo( $_FILES["file3"]["name"], PATHINFO_EXTENSION ); 
    $basename3 = $filename3 . "." . $extension3; 
    $source3 = $_FILES["file3"]["tmp_name"];
    $destination3  = "../resource/uploads/{$basename3}";    

    //file 4
    $filename4 = uniqid() . "-" . time(); 
    $extension4 = pathinfo( $_FILES["file4"]["name"], PATHINFO_EXTENSION ); 
    $basename4 = $filename4 . "." . $extension4; 
    $source4 = $_FILES["file4"]["tmp_name"];
    $destination4  = "../resource/uploads/{$basename4}";    

    $value1 = $_POST['brand_id'];
    $value2 = $_POST['model'];
    $value3 = $_POST['color'];
    $value4 = $_POST['size'];
    $value5 = $_POST['amount'];
    $value6 = $_POST['price'];
    $value7 = $_POST['desciption'];
    $value8 = $basename1;
    $value9 = $basename2;
    $value10 = $basename3;
    $value11 = $basename4;
    $output = "";  

    $query = $db->insertEleventColumn($con,'shoes','brand_id','model','color','size','amount','price','star','image1','image2','image3','image4', $value1, $value2, $value3, $value4, $value5, $value6, $value7, $value8, $value9, $value10, $value11);

    if($query){

        move_uploaded_file( $source1, $destination1 );
        move_uploaded_file( $source2, $destination2 );
        move_uploaded_file( $source3, $destination3 );
        move_uploaded_file( $source4, $destination4 );

        $shoes = $db->selectALLJoinTwoTable($con,'shoes','brand_shoes','brand_id','brand_id');
        $no_shoes = 0;
        $output .= "<table class=\"table table-striped table-hover bg-white\">";
        $output .= "<tr><th>ลำดับ</th><th>ชื่อแบรนด์</th><th>ชื่อรุ่น</th><th>ไซส์</th><th>สี</th><th></th></tr>";
        while($item_shoes = mysqli_fetch_array($shoes)) {
            $no_shoes++;
            $output .= "<tr>";  
            $output .= "<td>".$no_shoes."</td>";
            $output .= "<td>".$item_shoes['brand_name']."</td>";
            $output .= "<td>".$item_shoes['model']."</td>";
            $output .= "<td>".$item_shoes['size']."</td>"; 
            $output .= "<td>".$item_shoes['color']."</td>";
            $output .= "<td>";
            $output .= "<button class=\"btn btn-info btn_show_shoes_succes\" id=\"".$item_shoes['shoes_id']."\" data-bs-toggle=\"modal\" data-bs-target=\"#modal_show_details_shoes\">รายละเอียด</button> | ";
            $output .= "<button class=\"btn btn-warning btn_edit_shoes_success\" data-bs-toggle=\"modal\" data-bs-target=\"#edit_shoes_modal\" id=\"".$item_shoes['shoes_id']."\">แก้ไข</button> | ";
            $output .= "<button class=\"btn btn-danger btn_delete_shoes_success\" id=\"".$item_shoes['shoes_id']."\">ลบ</button> ";
            $output .= "</td>";
            $output .= "</tr>";
        }
        $output .= "</table>";
    }
    echo $output;
  }

  // fetch data from brand shoes
  if(isset($_POST['check_select_brand_shoes'])){
    $output = "";
    $brand_shoes2 = $db->selectAll($con,'brand_shoes');
    while($item_shoes2 = mysqli_fetch_array($brand_shoes2)){
        $output .= "<option value=\"".$item_shoes2['brand_id']."\">".$item_shoes2['brand_name'];
    }
    echo $output;
  }

  // delete
  if(isset($_POST['check_delete_shoes_success'])){
      $value = $_POST['check_delete_shoes_success'];
      $delete_image1 = "";
      $delete_image2 = "";
      $delete_image3 = "";
      $delete_image4 = "";

      $fetch = $db->selectWhereByOneColumn($con,'shoes','shoes_id',$value);

      $data_delete = mysqli_fetch_array($fetch);
      $delete_image1 = $data_delete['image1'];
      $delete_image2 = $data_delete['image2'];
      $delete_image3 = $data_delete['image3'];
      $delete_image4 = $data_delete['image4'];


      $query = $db->delete($con,'shoes','shoes_id',$value);
      $output = "";
      if($query){
        if(file_exists("../resource/uploads/{$delete_image1}")){
          unlink("../resource/uploads/{$delete_image1}");
        }
        if(file_exists("../resource/uploads/{$delete_image2}")){
          unlink("../resource/uploads/{$delete_image2}");
        }
        if(file_exists("../resource/uploads/{$delete_image3}")){
          unlink("../resource/uploads/{$delete_image3}");
        }
        if(file_exists("../resource/uploads/{$delete_image4}")){
          unlink("../resource/uploads/{$delete_image4}");
        }
        
        
        $shoes = $db->selectALLJoinTwoTable($con,'shoes','brand_shoes','brand_id','brand_id');
        $no_shoes = 0;
        $output .= "<table class=\"table table-striped table-hover bg-white\">";
        $output .= "<tr><th>ลำดับ</th><th>ชื่อแบรนด์</th><th>ชื่อรุ่น</th><th>ไซส์</th><th>สี</th><th></th></tr>";
        while($item_shoes = mysqli_fetch_array($shoes)) {
            $no_shoes++;
            $output .= "<tr>";  
            $output .= "<td>".$no_shoes."</td>";
            $output .= "<td>".$item_shoes['brand_name']."</td>";
            $output .= "<td>".$item_shoes['model']."</td>";
            $output .= "<td>".$item_shoes['size']."</td>"; 
            $output .= "<td>".$item_shoes['color']."</td>";
            $output .= "<td>";
            $output .= "<button class=\"btn btn-info btn_show_shoes_succes\" id=\"".$item_shoes['shoes_id']."\" data-bs-toggle=\"modal\" data-bs-target=\"#modal_show_details_shoes\">รายละเอียด</button> | ";
            $output .= "<button class=\"btn btn-warning btn_edit_shoes_success\" data-bs-toggle=\"modal\" data-bs-target=\"#edit_shoes_modal\" id=\"".$item_shoes['shoes_id']."\">แก้ไข</button> | ";
            $output .= "<button class=\"btn btn-danger btn_delete_shoes_success\" id=\"".$item_shoes['shoes_id']."\">ลบ</button> ";
            $output .= "</td>";
            $output .= "</tr>";
        }
        $output .= "</table>";
    }
    echo $output;
  }

  // view data edit shoes
  if(isset($_POST['check_view_data_shoes_success'])){
      $value = $_POST['check_view_data_shoes_success'];
      $query = $db->selectALLJoinTwoTableWhereOneColumn($con,'shoes','brand_shoes','brand_id','brand_id','shoes.shoes_id',$value);
      if($query){
        $shoes = mysqli_fetch_array($query);
        echo json_encode($shoes);
      }
      
  }

  // view data refresh
  if(isset($_POST['check_refresh_shoes_success'])){
    $shoes = $db->selectALLJoinTwoTable($con,'shoes','brand_shoes','brand_id','brand_id');
    $no_shoes = 0;
    $output = "";
    $output .= "<table class=\"table table-striped table-hover bg-white\">";
    $output .= "<tr><th>ลำดับ</th><th>ชื่อแบรนด์</th><th>ชื่อรุ่น</th><th>ไซส์</th><th>สี</th><th></th></tr>";
    while($item_shoes = mysqli_fetch_array($shoes)) {
        $no_shoes++;
        $output .= "<tr>";  
        $output .= "<td>".$no_shoes."</td>";
        $output .= "<td>".$item_shoes['brand_name']."</td>";
        $output .= "<td>".$item_shoes['model']."</td>";
        $output .= "<td>".$item_shoes['size']."</td>"; 
        $output .= "<td>".$item_shoes['color']."</td>";
        $output .= "<td>";
        $output .= "<button class=\"btn btn-info btn_show_shoes_succes\" id=\"".$item_shoes['shoes_id']."\" data-bs-toggle=\"modal\" data-bs-target=\"#modal_show_details_shoes\">รายละเอียด</button> | ";
        $output .= "<button class=\"btn btn-warning btn_edit_shoes_success\" data-bs-toggle=\"modal\" data-bs-target=\"#edit_shoes_modal\" id=\"".$item_shoes['shoes_id']."\">แก้ไข</button> | ";
        $output .= "<button class=\"btn btn-danger btn_delete_shoes_success\" id=\"".$item_shoes['shoes_id']."\">ลบ</button> ";
        $output .= "</td>";
        $output .= "</tr>";
    }
    $output .= "</table>";
    echo $output;

  }
?>