<?php
  
  include("mysql.php");

  $db = new db();
  $con = $db->connectDB();
  $output = "";

  // show details
  if(isset($_POST['check_show_details_brand_shoes'])){
    $id = $_POST['check_show_details_brand_shoes'];
    $query = $db->selectALLJoinTwoTableWhereOneColumn($con,'shoes','brand_shoes','brand_id','brand_id','shoes.brand_id',$id);
    $no = 0;
    $output .= "<table class=\"table table-striped table-hover\">";
    $output .= "<tr>";
    $output .= "<th>ลำดับ</th>";
    $output .= "<th>ชื่อรุ่น</th>";
    $output .= "<th>จำนวน</th>";
    $output .= "</tr>";
    while($item = mysqli_fetch_array($query)){
      $no++;
      $output .= "<tr>";
      $output .= "<td>".$no."</td>";
      $output .= "<td>".$item['model']."</td>";
      $output .= "<td>".$item['amount']."</td>";
      $output .= "</tr>";
    }
    
    $output .= "</table>";
    echo $output;
  }

  // start insert brand shoes 
  if(isset($_POST['check_insert_brand_shoes_success'])){
      $no = 0;
      $output = "";

      //file
      $filename = uniqid() . "-" . time(); 
      $extension = pathinfo( $_FILES["file"]["name"], PATHINFO_EXTENSION ); 
      $basename = $filename . "." . $extension; 
      $source = $_FILES["file"]["tmp_name"];
      $destination  = "../resource/uploads/{$basename}";
      //
      $value1 = $_POST['name'];
      $value2 = $basename;

      $query = $db->insertTwoColumn($con,'brand_shoes','brand_name','logo',$value1,$value2);

      if($query){
        move_uploaded_file( $source, $destination );
        $output .= "<table class=\"table table table-striped table-hover bg-white\">";
        $output .= "<tr>";
        $output .= "<th>ลำดับ</th>";
        $output .= "<th>ชื่อแบรนด์</th>";
        $output .= "<th>โลโก้</th>";
        $output .= "<th></th>";
        $output .= "</tr>";

        $brand_shoes = $db->selectAll($con,'brand_shoes');
        while($item_bsh = mysqli_fetch_array($brand_shoes)) {
            $output .= "<tr>";
            $no++;
            $output .= "<td>".$no."</td>";
            $output .= "<td>".$item_bsh['brand_name']."</td>";
            $output .= "<td><img src=\"../resource/uploads/".$item_bsh['logo'] ."\" style=\"width: 90px; height: 80px;\"> </td>";
            $output .= "<td>";
            $output .= "<button class=\"btn btn-info btn_show_details_brand_shoes\" id=\"". $item_bsh['brand_id'] ."\" data-bs-toggle=\"modal\" data-bs-target=\"#details_brand_shoes_modal\">รายละเอียด</button>  &nbsp; | &nbsp;";
            $output .= "<button class=\"btn btn-warning btn_view_brand_shoes\" id=\"".$item_bsh['brand_id']."\" data-bs-toggle=\"modal\" data-bs-target=\"#edit_brand_shoes_modal\">แก้ไข</button> &nbsp; | &nbsp;";
            $output .= "<button class=\"btn btn-danger btn_delete_brand_shoes\" id=\"". $item_bsh['brand_id'] ."\">ลบ</button>";
            $output .= "</td>";
            $output .= "</tr>";
        }
        $output .= "</table>";
      }

      echo $output;

  }

  // end insert brand shoes
  
  // satrt view 

  if(isset($_POST['check_view_brand_shoes_success'])){
      $value = $_POST['check_view_brand_shoes_success'];
      $query = $db->selectWhereByOneColumn($con,'brand_shoes','brand_id',$value);
      if($query){
          $item = mysqli_fetch_array($query);
          echo json_encode($item);
      }
  }

  // end view 

  // start delete

  if(isset($_POST['check_delete_brand_shoes_success'])){
      $value = $_POST['check_delete_brand_shoes_success'];

      $queryfindlogo = $db->selectWhereByOneColumn($con,'brand_shoes','brand_id',$value);
      $logo = mysqli_fetch_array($queryfindlogo);
      $filename_deleted = $logo['logo'];
      //check file delete
      if(file_exists("../resource/uploads/{$filename_deleted}")){
          unlink("../resource/uploads/{$filename_deleted}");
        }


      $query = $db->delete($con,'brand_shoes','brand_id',$value);
      $output = "";
      $no = 0;

      if($query){

        $output .= "<table class=\"table table table-striped table-hover bg-white\">";
        $output .= "<tr>";
        $output .= "<th>ลำดับ</th>";
        $output .= "<th>ชื่อแบรนด์</th>";
        $output .= "<th>โลโก้</th>";
        $output .= "<th></th>";
        $output .= "</tr>";

        $brand_shoes = $db->selectAll($con,'brand_shoes');
        while($item_bsh = mysqli_fetch_array($brand_shoes)) {
            $output .= "<tr>";
            $no++;
            $output .= "<td>".$no."</td>";
            $output .= "<td>".$item_bsh['brand_name']."</td>";
            $output .= "<td><img src=\"../resource/uploads/".$item_bsh['logo'] ."\" style=\"width: 90px; height: 80px;\"> </td>";
            $output .= "<td>";
            $output .= "<button class=\"btn btn-info btn_show_details_brand_shoes\" id=\"". $item_bsh['brand_id'] ."\" data-bs-toggle=\"modal\" data-bs-target=\"#details_brand_shoes_modal\">รายละเอียด</button>  &nbsp; | &nbsp;";
            $output .= "<button class=\"btn btn-warning btn_view_brand_shoes\" id=\"".$item_bsh['brand_id']."\" data-bs-toggle=\"modal\" data-bs-target=\"#edit_brand_shoes_modal\">แก้ไข</button> &nbsp; | &nbsp;";
            $output .= "<button class=\"btn btn-danger btn_delete_brand_shoes\" id=\"". $item_bsh['brand_id'] ."\">ลบ</button>";
            $output .= "</td>";
            $output .= "</tr>";
        }
        $output .= "</table>";
      }

      echo $output;
  }
  
  // end delete

  // start update

  if(isset($_POST['check_update_brand_shoes_success'])){
    $output = "";
    $no = 0;
    //checkfile
    $checkfile = $_FILES['file']['name'];
    //file
    $filename = uniqid() . "-" . time(); 
    $extension = pathinfo( $_FILES["file"]["name"], PATHINFO_EXTENSION ); 
    $basename = $filename . "." . $extension; 
    $source = $_FILES["file"]["tmp_name"];
    $destination  = "../resource/uploads/{$basename}";
    //
    $value1 = $_POST['name'];
    $value2 = $basename;
    $valueWhere = $_POST['edit_id'];
    $statusOut = 0;
    $filename_deleted = $_POST['filename_deleted'];
    
    // if check file update
    if(empty($checkfile)){
      $query = $db->updateOneColumn($con, 'brand_shoes', 'brand_name', $value1, 'brand_id',$valueWhere);  
      if($query){
        $statusOut = 1;
      }

    }else{
      $query = $db->updateTwoColumn($con,'brand_shoes', 'brand_name', $value1, 'logo', $value2, 'brand_id',$valueWhere);
      if($query){
        $statusOut = 1;
          //check file delete
          if(file_exists("../resource/uploads/{$filename_deleted}")){
            unlink("../resource/uploads/{$filename_deleted}");
          }
        move_uploaded_file( $source, $destination );
      }

    }

    if($statusOut == 1){
      $output .= "<table class=\"table table table-striped table-hover bg-white\">";
      $output .= "<tr>";
      $output .= "<th>ลำดับ</th>";
      $output .= "<th>ชื่อแบรนด์</th>";
      $output .= "<th>โลโก้</th>";
      $output .= "<th></th>";
      $output .= "</tr>";

      $brand_shoes = $db->selectAll($con,'brand_shoes');
      while($item_bsh = mysqli_fetch_array($brand_shoes)) {
          $output .= "<tr>";
          $no++;
          $output .= "<td>".$no."</td>";
          $output .= "<td>".$item_bsh['brand_name']."</td>";
          $output .= "<td><img src=\"../resource/uploads/".$item_bsh['logo'] ."\" style=\"width: 90px; height: 80px;\"> </td>";
          $output .= "<td>";
          $output .= "<button class=\"btn btn-info btn_show_details_brand_shoes\" id=\"". $item_bsh['brand_id'] ."\" data-bs-toggle=\"modal\" data-bs-target=\"#details_brand_shoes_modal\">รายละเอียด</button>  &nbsp; | &nbsp;";
          $output .= "<button class=\"btn btn-warning btn_view_brand_shoes\" id=\"".$item_bsh['brand_id']."\" data-bs-toggle=\"modal\" data-bs-target=\"#edit_brand_shoes_modal\">แก้ไข</button> &nbsp; | &nbsp;";
          $output .= "<button class=\"btn btn-danger btn_delete_brand_shoes\" id=\"". $item_bsh['brand_id'] ."\">ลบ</button>";
          $output .= "</td>";
          $output .= "</tr>";
      }
      $output .= "</table>";
    }

    echo $output;

  }

  // end update

?>


                      
                        
                        
                        
                      