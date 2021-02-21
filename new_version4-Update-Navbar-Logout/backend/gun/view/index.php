<?php 
  include("../config/mysql.php");
  $db = new db();
  $con = $db->connectDB();
  
  // start brand shoes
  $brand_shoes = $db->selectAll($con,'brand_shoes');
  $no_brand_shoes = 0;
  // end brand shoes

  // startbrand
  $shoes = $db->selectALLJoinTwoTable($con,'shoes','brand_shoes','brand_id','brand_id');
  // end shoes

  // start orders
  $orders = $db->selectALLJoinThreeTable($con,'orders','shopping_cart','user','orders_id','cart_id','user_id');
  // end orders
?>

<!DOCTYPE html>
 <html>
   
   <head>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous"> 
   </head>
   
   <body class="bg-dark">

     <div class="m-3" style="height: 100px;">

     </div>
     
     <div class="m-3">
     
       <div class="row">
         <!-- เริ่มส่วนปุ่มเมนู -->
         <div class="col-2">
           <div class="list-group" id="list-tab" role="tablist" >
             <a class="list-group-item list-group-item-action active" id="list-home-list" data-bs-toggle="list" href="#list-home" role="tab" aria-controls="home">หน้าแรก</a>
             <a class="list-group-item list-group-item-action" id="list-orders-list" data-bs-toggle="list" href="#list-orders" role="tab" aria-controls="orders">รายการสั่งซื้อ</a>
             <a class="list-group-item list-group-item-action" id="list-profile-list" data-bs-toggle="list" href="#list-profile" role="tab" aria-controls="profile">แบรนด์</a>
             <a class="list-group-item list-group-item-action btn_refesh_shoes_success" id="list-messages-list" data-bs-toggle="list" href="#list-messages" role="tab" aria-controls="messages">รองเท้า</a>
             <a class="list-group-item list-group-item-action" id="list-customers-list" data-bs-toggle="list" href="#list-customers" role="tab" aria-controls="customers">ผู้ใช้งาน</a>
             <a class="list-group-item list-group-item-action" id="list-payment-list" data-bs-toggle="list" href="#list-payment" role="tab" aria-controls="payment">การชำระเงิน</a>
             <a class="list-group-item list-group-item-action" id="list-settings-list" data-bs-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Settings</a>
             <a class="list-group-item list-group-item-action" id="list-index-list" data-bs-toggle="list" href="#list-index" role="tab" aria-controls="index">ออกจากระบบ</a>
           </div>
         </div>
         <!-- สิ้นสุดส่วนปุ่มเมนู -->
  
         <div class="col-10">
         
             <div class="tab-content" id="nav-tabContent">
               
               <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">...</div>

               
               <!-- เริ่มส่วนของ brand -->
               <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                 
                 <div>
                   <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_brand_shoes_modal">เพิ่มรายการใหม่</a>
                   <hr class="bg-white">

                   <div class="m-2" id="show_brand_shoes">
                    <table class="table table-striped table-hover bg-white">
                      <tr>
                        <th >ลำดับ</th>
                        <th >ชื่อ</th>
                        <th >โลโก้</th>
                        <th></th>
                      </tr>
                      <?php while($item_bsh = mysqli_fetch_array($brand_shoes)) { ?>
                      <tr>
                        <td><?php $no_brand_shoes++; echo $no_brand_shoes; ?></td>
                        <td><?php echo $item_bsh['brand_name']; ?></td>
                        <td><img src="../resource/uploads/<?php echo $item_bsh['logo']; ?>" style="width: 90px; height: 80px;"></td>
                        <td>
                           <!--ปุ่มรายละเอียด-->
                           <button class="btn btn-info btn_show_details_brand_shoes" id="<?php echo $item_bsh['brand_id']; ?>">รายละเอียด</button>  &nbsp; | &nbsp;

                           <!--ปุ่มแก้ไข-->
                           <button class="btn btn-warning btn_view_brand_shoes" id="<?php echo $item_bsh['brand_id']; ?>" data-bs-toggle="modal" data-bs-target="#edit_brand_shoes_modal">แก้ไข</button> &nbsp; | &nbsp;
                           
                           <!--ปุ่มลบ-->
                           <button class="btn btn-danger btn_delete_brand_shoes" id="<?php echo $item_bsh['brand_id']; ?>">ลบ</button>

                        </td>
                      </tr>
                      <?php } ?>
                    </table>
                   </div>

                 </div>
              
               </div>
               <!-- สิ้นสุดส่วนของ brand-->
               
               <!-- เริ่มส่วน shoes -->
               <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
                 <div>
                   <button class="btn btn-primary btn_selecte_show_brand_shoes" data-bs-toggle="modal" data-bs-target="#add_shoes_modal">เพิ่มรายการใหม่</button>
                   <div class="container-fluid p-0 m-0">
                    <form action="../config/shoes.php" method="POST">
                      <div class="row mt-3">
                        <div class="col-md-2">
                          <select class="form-select" id="select_type_search_shoes">
                            <option value="brand_shoes.brand_name">ชื่อแบรนด์</option>
                            <option value="shoes.model">ชื่อรุ่น</option>
                            <option value="shoes.size">ไซส์</option>
                            <option value="shoes.color">สี</option>
                          </select>
                        </div>
                        <div class="col-md-4"><input type="text" name="key" class="form-control" placeholder="ระบุคีย์เวิร์ดค้นหา" id="search_shoes"></div>
                      </div>
                    </form>
                   </div>
                   <hr class="bg-white"/>
                   <div id="view_table_shoes">
                     <table class="table table-striped table-hover bg-white">
                       <tr>
                         <th>ลำดับ</th>
                         <th>ชื่อแบรนด์</th>
                         <th>ชื่อรุ่น</th>
                         <th>ไซส์</th>
                         <th>สี</th>
                         <th></th>
                       </tr>
                      
                       <?php 
                         $no_shoes = 0;
                         while($item_shoes = mysqli_fetch_array($shoes)) { ?>
                       <tr>
                         <td><?php $no_shoes++;echo $no_shoes; ?></td>
                         <td><?php echo $item_shoes['brand_name']; ?></td>
                         <td><?php echo $item_shoes['model']; ?></td>
                         <td><?php echo $item_shoes['size']; ?></td>
                         <td><?php echo $item_shoes['color']; ?></td>
                         <td>
                          <button class="btn btn-info btn_show_shoes_succes" id="<?php echo $item_shoes['shoes_id']; ?>"  data-bs-toggle="modal" data-bs-target="#modal_show_details_shoes">รายละเอียด</button> | 
                          <button class="btn btn-warning btn_edit_shoes_success" data-bs-toggle="modal" data-bs-target="#edit_shoes_modal" id="<?php echo $item_shoes['shoes_id']; ?>">แก้ไข</button> | 
                          <button class="btn btn-danger btn_delete_shoes_success" id="<?php echo $item_shoes['shoes_id']; ?>">ลบ</button> 
                         </td>
                       </tr>
                       <?php } ?>
                     </table>
                   </div>
                 </div>
               </div>
               <!-- สิ้นสุดส่วน shoes -->

              <!-- เริ่มส่วนของ Orders -->
              <div class="tab-pane fade" id="list-orders" role="tabpanel" aria-labelledby="list-orders-list">
                <div>
                   <div class="container-fluid p-0 m-0">
                    <form action="../config/shoes.php" method="POST">
                      <div class="row mt-3">
                        <div class="col-md-2">
                          <select class="form-select" id="select_type_search_orders"> <!-- select_type_search_shoes -->
                            <option value="orders.orders_id">รหัสสั่งซื้อ</option>
                            <option value="user.user_id">ชื่อลูกค้า</option>
                            <option value="shopping_cart.cart_id">สถานะ</option>
                          </select>
                        </div>
                        <div class="col-md-4"><input type="text" name="key" class="form-control" placeholder="ระบุคีย์เวิร์ดค้นหา" id="search_orders"></div> <!-- search_shoes ชี้ไป modal -->
                      </div>
                    </form>
                   </div>
                   <hr class="bg-white"/>
                   <div id="view_table_orders">
                     <table class="table table-striped table-hover bg-white">
                       <tr>
                         <th>ลำดับ</th>
                         <th>รหัสสั่งซื้อ</th>
                         <th>ราคารวม</th>
                         <th>ชื่อลูกค้า</th>
                         <th>สถานะ</th>
                         <th></th>
                       </tr>
                      
                       <?php 
                         $no_shoes = 0;
                         while($item_orders = mysqli_fetch_array($orders)) { ?>
                       <tr>
                         <td><?php $no_shoes++;echo $no_shoes; ?></td>
                         <td><?php echo $item_orders['orders_id']; ?></td>
                         <td><?php echo $item_orders['total_price']; ?></td>
                         <td><?php echo $item_orders['fname']; ?></td>
                         <td><?php echo $item_orders['cart_status']; ?></td>
                         <td>
                          <button class="btn btn-info btn_show_orders_succes" id="<?php echo $item_orders['orders_id']; ?>"  data-bs-toggle="modal" data-bs-target="#modal_show_details_orders">รายละเอียด</button> | 
                          <button class="btn btn-warning btn_edit_shoes_success" data-bs-toggle="modal" data-bs-target="#edit_shoes_modal" id="<?php echo $item_shoes['shoes_id']; ?>">แก้ไข</button> | 
                          <button class="btn btn-danger btn_delete_shoes_success" id="<?php echo $item_shoes['shoes_id']; ?>">ลบ</button> 
                         </td>
                       </tr>
                       <?php } ?>
                     </table>
                   </div>
                 </div>
               </div>
               <!-- สิ้นสุดส่วนของ Orders -->
               
               <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">...</div>
               <div class="tab-pane fade" id="list-customers" role="tabpanel" aria-labelledby="list-customers-list">...</div>
               <div class="tab-pane fade" id="list-payment" role="tabpanel" aria-labelledby="list-payment-list"></div>
               <div class="tab-pane fade" id="list-index" role="tabpanel" aria-labelledby="list-index-list"></div>
             </div>
         </div>
      </div>
     </div>

     <!-- เริ่มส่วน Modal -->

       <!--เริ่ม shoes -->
         
         <!--Modal เพิ่ม-->
         <div class="fade modal" id="add_shoes_modal" data-bs-backdrop="static">
           <div class="modal-dialog modal-lg">
             <div class="modal-content">
               <div class="modal-header">
                 <h5 class="modal-title">เพิ่มรองเท้า</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                 <div>
                   <form id="form_insert_shoes" action="../config/shoes.php" method="POST" enctype="multipart/form-data">
                     
                     <div class="row">
                       
                       <input type="hidden" value="1" name="check_insert_shoes_success">
                       
                       <div class="col-6">
                         <label>เลือกแบรนด์</label>
                         <select class="form-select w-100" name="brand_id" id="select_input_brand_shoes">
                         </select>
                       </div>

                       <div class="col-6">
                         <label>รุ่น</label>
                         <input type="text" class="form-control w-100" name="model" placeholder="model">
                       </div>

                       <div class="col-6">
                         <label>สี</label>
                         <input type="text" class="form-control w-100" name="color" placeholder="color">
                       </div>

                       <div class="col-6">
                         <label>ไซต์</label>
                         <input type="text" class="form-control w-100" name="size" placeholder="size">
                       </div>

                       <div class="col-6">
                         <label>จำนวน</label>
                         <input type="number" class="form-control w-100" value="1" name="amount" >
                       </div>

                       <div class="col-6">
                         <label>ราคา</label>
                         <input type="number" class="form-control w-100" name="price" >
                       </div>
                       
                       <br>
                       <hr class="mt-3">

                       <div class="col-6">
                         <label>รูปภาพที่1</label>
                         <div>
                           <img id="bf_image_shoes1" src="../resource/images/icon/images.png" width="100px" height="100px" >
                         </div>
                         <input type="file" class="form-control w-100" name="file1" >
                       </div>

                       <div class="col-6">
                         <label>รูปภาพที่2</label>
                         <div>
                           <img id="bf_image_shoes2" src="../resource/images/icon/images.png" width="100px" height="100px" >
                         </div>
                         <input type="file" class="form-control w-100" name="file2" >
                       </div>

                       <div class="col-6">
                         <label>รูปภาพที่3</label>
                         <div>
                           <img id="bf_image_shoes3" src="../resource/images/icon/images.png" width="100px" height="100px" >
                         </div>
                         <input type="file" class="form-control w-100" name="file3" >
                       </div>

                       <div class="col-6">
                         <label>รูปภาพที่4</label>
                         <div>
                           <img id="bf_image_shoes4" src="../resource/images/icon/images.png" width="100px" height="100px" >
                         </div>
                         <input type="file" class="form-control w-100" name="file4" >
                       </div>

                     </div>
                   </form>
                 </div>
               </div>
               <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                 <button type="button" class="btn btn-primary" id="btn_insert_shoes">Insert</button>
               </div>
             </div>
           </div>
        </div>

        <!--Modal แก้ไข้-->
        <div class="fade modal" id="edit_shoes_modal" data-bs-backdrop="static">
           <div class="modal-dialog modal-lg">
             <div class="modal-content">
               <div class="modal-header">
                 <h5 class="modal-title">เพิ่มรองเท้า</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                 <div>
                   <form id="form_edit_shoes" action="../config/shoes.php" method="POST" enctype="multipart/form-data">
                     
                     <div class="row">

                       <div class="col-6">
                         <label>เลือกแบรนด์</label>
                         <select class="form-select" name="brand_id" id="set_data_brand_id">
                           <?php 
                             $brand_shoes2 = $db->selectAll($con,'brand_shoes');
                             while($item_shoes2 = mysqli_fetch_array($brand_shoes2)){ 
                            ?>
                             <option value="<?php echo $item_shoes2['brand_id']; ?>"><?php echo $item_shoes2['brand_name']; ?></option>
                           <?php } ?>
                         </select>
                       </div>

                       <div class="col-6">
                         <label>รุ่น</label>
                         <input type="text" class="form-control w-100" name="model" id="set_data_model" placeholder="model">
                       </div>

                       <div class="col-6">
                         <label>สี</label>
                         <input type="text" class="form-control w-100" name="color" id="set_data_color" placeholder="color">
                       </div>

                       <div class="col-6">
                         <label>ไซต์</label>
                         <input type="text" class="form-control w-100" name="size" id="set_data_size" placeholder="size">
                       </div>

                       <div class="col-6">
                         <label>จำนวน</label>
                         <input type="number" class="form-control w-100" id="set_data_amount" value="1" name="amount" >
                       </div>

                       <div class="col-6">
                         <label>ราคา</label>
                         <input type="number" class="form-control w-100" name="price" id="set_data_price_shoes">
                       </div>

                       <br>
                       <hr class="mt-3">

                       <div class="col-6">
                         <label>รูปภาพที่1</label>
                         <div>
                           <img id="bf_edit_image_shoes3" src="../resource/images/icon/images.png" width="100px" height="100px" >
                         </div>
                         <input type="file" class="form-control w-100" name="file1" >
                       </div>

                       <div class="col-6">
                         <label>รูปภาพที่2</label>
                         <div>
                           <img id="bf_edit_image_shoes3" src="../resource/images/icon/images.png" width="100px" height="100px" >
                         </div>
                         <input type="file" class="form-control w-100" name="file2" >
                       </div>

                       <div class="col-6">
                         <label>รูปภาพที่3</label>
                         <div>
                           <img id="bf_edit_image_shoes3" src="../resource/images/icon/images.png" width="100px" height="100px" >
                         </div>
                         <input type="file" class="form-control w-100" name="file3" >
                       </div>

                       <div class="col-6">
                         <label>รูปภาพที่4</label>
                         <div>
                           <img id="bf_edit_image_shoes3" src="../resource/images/icon/images.png" width="100px" height="100px" >
                         </div>
                         <input type="file" class="form-control w-100" name="file4" >
                       </div>

                     </div>
                   </form>
                 </div>
               </div>
               <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                 <button type="button" class="btn btn-primary" id="">Insert</button>
               </div>
             </div>
           </div>
        </div>

        <!-- Modal รายลเอียด -->
        <div class="fade modal" id="modal_show_details_shoes" data-bs-backdrop="static">
           <div class="modal-dialog modal-lg">
             <div class="modal-content">
               <div class="modal-header">
                 <h5 class="modal-title">รายละเอียด</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                 <div id="box_view_detials_shoes">
                   <div>
                     <table class="table">
                       <tr>
                        <th>ชื่อแบรนด์ : <span id="show_shoes_brand"></span> </th>
                        <th rowspan="3">
                          <img id="show_shoes_image1" src="" style="width: 150px; height: 120px;">
                        </th>
                        <th rowspan="3">
                          <img id="show_shoes_image2" src="" style="width: 150px; height: 120px;">
                        </th>
                       </tr>
                       <tr>
                        <th>ชื่อรุ่น : <span id="show_shoes_model"></span></th>
                       </tr>
                       <tr>
                        <th>สี: <span id="show_shoes_color"></span></th>
                       </tr>
                       <tr>
                        <th>ขนาด: <span id="show_shoes_size"></span></th>
                        <th rowspan="3">
                          <img id="show_shoes_image3" src="" style="width: 150px; height: 120px;">
                        </th>
                        <th rowspan="3">
                          <img id="show_shoes_image4" src="" style="width: 150px; height: 120px;">
                        </th>
                       </tr>
                       <tr>
                        <th>จำนวน: <span id="show_shoes_amount"></span></th>
                       </tr>
                       <tr>
                        <th>ราคา: <span id="show_shoes_price"></span></th>
                       </tr>

                    </table>
                   </div>
                 </div>
               </div>
               <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
               </div>
             </div>
           </div>
        </div>

       <!--สิ้นสุด shoes-->

       <!-- Modal รายลเอียด Orders -->
       <div class="fade modal" id="modal_show_details_orders" data-bs-backdrop="static">
           <div class="modal-dialog modal-lg">
             <div class="modal-content">
               <div class="modal-header">
                 <h5 class="modal-title">รายละเอียด</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                 <div id="box_view_detials_shoes">
                   <div>
                     <table class="table">
                     <tr>
                        <th>รหัสสั่งซื้อ : <span id="show_shoes_brand"></span> </th>
                        <th rowspan="3">
                          <img id="show_shoes_image1" src="" style="width: 150px; height: 120px;">
                        </th>
                        <th rowspan="3">
                          <img id="show_shoes_image2" src="" style="width: 150px; height: 120px;">
                        </th>
                       </tr>
                       <tr>
                        <th>ชื่อลูกค้า : <span id="show_shoes_model"></span></th>
                       </tr>
                       <tr>
                        <th>นามสกุลลูกค้า: <span id="show_shoes_color"></span></th>
                       </tr>
                       <tr>
                        <th>อีเมล์: <span id="show_shoes_size"></span></th>
                        <th rowspan="3">
                          <img id="show_shoes_image3" src="" style="width: 150px; height: 120px;">
                        </th>
                        <th rowspan="3">
                          <img id="show_shoes_image4" src="" style="width: 150px; height: 120px;">
                        </th>
                       </tr>
                       <tr>
                        <th>จำนวน: <span id="show_shoes_amount"></span></th>
                       </tr>
                       <tr>
                        <th>เบอร์โทร: <span id="show_shoes_price"></span></th>
                       </tr>
                       <tr>
                        <th>ที่อยู่: <span id="show_shoes_price"></span></th>
                       </tr>

                    </table>
                   </div>
                 </div>
               </div>
               <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
               </div>
             </div>
           </div>
        </div>

       <!--สิ้นสุด orders-->

       
       <!--ฺ เริ่ม brand shoes -->

        <!-- Modal เพิ่ม --> 
        <div class="fade modal" id="add_brand_shoes_modal" data-bs-backdrop="static">
           <div class="modal-dialog">
             <div class="modal-content">
               <div class="modal-header">
                 <h5 class="modal-title">เพิ่มแบรนด์</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                 <div>
                   <form runat="server" id="form_insert_brand_shoes" action="../config/brand_shoes.php" method="POST" enctype="multipart/form-data">
                    <div>
                       <div>
                         <input type="hidden" name="check_insert_brand_shoes_success" value="1">
                         <label>ชื่อแบรนด์</label>
                         <input type="text" name="name" class="form-control w-75" placeholder="ex. Nike">
                       </div>
                       <br>
                       
                       <div>
                         <label>โลโก้ แบรนด์</label>
                         <div>
                           <img id="bf_logo_upload" src="../resource/images/icon/images.png" width="100px" height="100px" >
                         </div>
                         <br/>
                         <input type="file" name="file" class="form-control w-75" id="change_logo"  >
                       </div>
                     </div>
                   </form>
                 </div>
               </div>
               <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                 <button type="button" class="btn btn-primary" id="btn_form_insert_brand_shoes">Insert</button>
               </div>
             </div>
           </div>
        </div>

        <!-- Modal แก้ไข-->

        <div class="fade modal" id="edit_brand_shoes_modal" data-bs-backdrop="static">
           <div class="modal-dialog">
             <div class="modal-content">
               <div class="modal-header">
                 <h5 class="modal-title">แก้ไขข้อมูลแบรนด์</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                 <div>
                   <form id="form_edit_brand_shoes_success" action="../config/brand_shoes.php" method="POST" enctype="multipart/form-data">
                    <div>
                       <div>
                         <input type="hidden" name="check_update_brand_shoes_success" value="1">
                         <input type="hidden" name="edit_id" id="set_data_update_brand_shoes" value="1">
                         <input type="hidden" name="filename_deleted" id="set_data_delete_image" value="1">
                         <label>ชื่อแบรนด์</label>
                         <input type="text" name="name" id="view_brand_shoes_name" class="form-control w-75" placeholder="ex. Nike">
                       </div>
                       <div>
                         <label>logo</label>
                         <input type="file" name="file" class="form-control w-75" >
                       </div>
                     </div>
                   </form>
                 </div>
               </div>
               <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                 <button type="button" class="btn btn-primary" id="btn_update_shoes_brand">Update</button>
               </div>
             </div>
           </div>
        </div>

       <!-- จบ brand shoes -->

     <!-- สิ้นสุดส่วน Model -->

     <script src="../resource/js/app.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
   </body>
 
 </html>