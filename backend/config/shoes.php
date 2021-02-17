<?php
  include("mysql.php");

  $db = new db();
  $con = $db->connectDB();
  $output = "";

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
          $output .= "<button class=\"btn btn-info\" id=\"".$item_shoes['shoes_id']."\">รายละเอียด</button> | ";
          $output .= "<button class=\"btn btn-warning btn_edit_shoes_success\" data-bs-toggle=\"modal\" data-bs-target=\"#edit_shoes_modal\" id=\"".$item_shoes['shoes_id']."\">แก้ไข</button> | ";
          $output .= "<button class=\"btn btn-danger btn_delete_shoes_success\" id=\"".$item_shoes['shoes_id']."\">ลบ</button> ";
          $output .= "</td>";
          $output .= "</tr>";
      }
      $output .= "</table>";
      echo $output;

    }else{

      $shoes = $db->selectALLJoinTwoTableWhereLikeOneColumn($con,'','','','',$type,$key);
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
          $output .= "<button class=\"btn btn-info\" id=\"".$item_shoes['shoes_id']."\">รายละเอียด</button> | ";
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
    $value7 = 0;
    $value8 = $destination1;
    $value9 = $destination2;
    $value10 = $destination3;
    $value11 = $destination4;
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
            $output .= "<button class=\"btn btn-info\" id=\"".$item_shoes['shoes_id']."\">รายละเอียด</button> | ";
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
      $query = $db->delete($con,'shoes','shoes_id',$value);
      $output = "";
      if($query){
        
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
            $output .= "<button class=\"btn btn-info\" id=\"".$item_shoes['shoes_id']."\">รายละเอียด</button> | ";
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
        $output .= "<button class=\"btn btn-info\" id=\"".$item_shoes['shoes_id']."\" data-bs-toggle=\"modal\" data-bs-target=\"#modal_show_details_shoes\">รายละเอียด</button> | ";
        $output .= "<button class=\"btn btn-warning btn_edit_shoes_success\" data-bs-toggle=\"modal\" data-bs-target=\"#edit_shoes_modal\" id=\"".$item_shoes['shoes_id']."\">แก้ไข</button> | ";
        $output .= "<button class=\"btn btn-danger btn_delete_shoes_success\" id=\"".$item_shoes['shoes_id']."\">ลบ</button> ";
        $output .= "</td>";
        $output .= "</tr>";
    }
    $output .= "</table>";
    echo $output;

  }
?>