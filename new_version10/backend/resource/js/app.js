
//******************************************************************************************
// jquery

$(document).ready(function(){

// start calculate 

$('#btn_cal_income').click(function(){
    var from = $('#cal_from').val();
    var to = $('#cal_to').val();

    if(from > to){
        alert("ข้อมูลไม่ถูกต้อง!")
    }else{
        $.ajax({
            url: "../config/income.php",
            method: "POST",
            data: { check_cal_income:1, from:from, to:to },
            success:function(data){
                $('#moda_show_cal_income').modal('show');
                $('#box_show_cal_income').html(data);
            }
        })
    }
})

// end calculate

// start banner

  $(document).on('submit', '#form_update_banner',function(event){
      event.preventDefault();
      var formData = new FormData($(this)[0]);
      $.ajax({
          url: "../config/banner.php",
          data: formData,
          contentType: false,
          processData: false,
          cache: false,
          type: 'POST',
          success:function(data){
             $('#box_view_banner').html(data);
          }
      });
  })

// end banner

// start users

// search users
$('#search_users').keyup(function(event){
    event.preventDefault()
    var key = $('#search_users').val();
    var type = $('#select_type_search_users').val();
    $.ajax({
        url: "../config/users.php",
        method: "POST",
        data: { check_seach_users:1, key:key, type:type },
        success:function(data){
            $('#box_view_all_users').html(data)
        }
    })
})

// show details users
$(document).on('click','.btn_users_show_details_users', function(){
    var id = $(this).attr('id');
    $.ajax({
        url: "../config/users.php",
        method: "POST",
        data: { check_show_users_details_users: id},
        success:function(data){
            $('#box_users_show_details_users').html(data)
        }
    })
})

// end users


//  start order

// order search

$('#search_order').keyup(function(event){
    event.preventDefault();
    var key = $('#search_order').val();
    var type = $('#select_type_search_order').val();
    $.ajax({
        url: "../config/order.php",
        method: "POST",
        data: { check_order_search:1, key:key, type:type },
        success:function(data){
            $('#box_view_order').html(data);
        }
    })
})

// oder show order details 
$(document).on('click', '.btn_order_show_orders_details', function(){
    var id = $(this).attr('id')
    
    $.ajax({
        url: "../config/order.php",
        method: "POST",
        data: { check_order_show_order_details:id },
        success:function(data){
            $('#box_view_orders_order_details').html(data);
        }
    })
})

//  orders show user details
$(document).on('click', '.btn_order_show_user_details', function(){
    var id = $(this).attr('id')

    $.ajax({
        url: "../config/order.php",
        method: "POST",
        data: { check_order_user_order_details:id },
        success:function(data){
            $('#box_orders_show_user').html(data)
        }
    })
})

// orders update status order

$('#form_order_update_status_order').on('submit', function(event){
    event.preventDefault()

    $.ajax({
        url: "../config/order.php",
        method: "POST",
        data: $(this).serialize(),
        success:function(data){
            $('#box_view_order').html(data);
            $('#order_modal_update_status').modal('hide');
            $('#form_order_update_status_order')[0].reset();
        }
    })

})

$(document).on('click', '.btn_order_show_update_status_order', function(){
    var id = $(this).attr('id')
    $('#set_edit_order_id').val(id);
})


// end order


// start shoes
 
    // edit shoes
    $('#form_edit_shoes').on('submit', function(event){
        event.preventDefault();
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: "../config/shoes.php",
            data: formData,
            contentType: false,
            processData: false,
            cache: false,
            type: 'POST',
            success:function(data){
                $('#view_table_shoes').html(data);
                $('#edit_shoes_modal').modal('hide');
                $('#form_edit_shoes')[0].reset();
            }
        });
    })

    //submit edit form
    $('#btn_submit_form_edit_shoes').click(function(){
        $('#form_edit_shoes').submit();
    })
    
    
    //insert shoes
    $('#btn_insert_shoes').click(function(){
        $('#form_insert_shoes').submit();
    });

    $('#form_insert_shoes').on('submit',function(event){
        event.preventDefault()
        var formData = new FormData($('#form_insert_shoes')[0]);
        $.ajax({
            url: "../config/shoes.php",
            data: formData,
            contentType: false,
            processData: false,
            cache: false,
            type: 'POST',
            success:function(data){
                $('#form_insert_shoes')[0].reset();
                $('#view_table_shoes').html(data);
                $('#add_shoes_modal').modal('hide');
            }
        });
    });

    // view brand shoes select
    $(document).on('click','.btn_selecte_show_brand_shoes',function(){
        var check = 1;
        $.ajax({
            url: "../config/shoes.php",
            method: "POST",
            data: {check_select_brand_shoes:check},
            success:function(data){
                $('#select_input_brand_shoes').html(data)
               
            }
        });
    });

    //view data 
    $(document).on('click','.btn_edit_shoes_success',function(){
        var id = $(this).attr('id');
        $.ajax({
            url: "../config/shoes.php",
            method: "POST",
            data: {check_view_data_shoes_success:id},
            dataType: "json",
            success:function(data){
                $('#set_data_brand_id').val(data.brand_id);
                $('#set_data_model').val(data.model);
                $('#set_data_color').val(data.color);
                $('#set_data_size').val(data.size);
                $('#set_data_amount').val(data.amount);
                $('#set_data_price_shoes').val(data.price);
                $('#set_update_shoes_id').val(data.shoes_id)
                $('#set_description').val(data.star)
                $('#set_value_shoes_image1').val(data.image1)
                $('#set_value_shoes_image2').val(data.image2)
                $('#set_value_shoes_image3').val(data.image3)
                $('#set_value_shoes_image4').val(data.image4)
            }
        });
    });

    // delete shoes
    $(document).on('click','.btn_delete_shoes_success',function(event){
        event.preventDefault();
        var id = $(this).attr('id');
        $.ajax({
            url: "../config/shoes.php",
            method: "POST",
            data: {check_delete_shoes_success:id},
            success:function(data){
                $('#form_insert_shoes')[0].reset();
                $('#view_table_shoes').html(data);
            }
        });
    });

    // refresh table view shoes

    $(document).on('click','.btn_refesh_shoes_success',function(event){
        event.preventDefault();
        var check = 1;
        $.ajax({
            url: "../config/shoes.php",
            method: "POST",
            data: {check_refresh_shoes_success:check},
            success:function(data){
                $('#view_table_shoes').html(data);
            }
        });
    });

    // search shoes
    $(document).on('keyup', '#search_shoes', function(){
        var key = $('#search_shoes').val();
        var type = $('#select_type_search_shoes').val();
        
        $.ajax({
            url: "../config/shoes.php",
            method: "POST",
            data: {check_search_shoes:1 ,key:key, type:type},
            success:function(data){
                $('#view_table_shoes').html(data);
            }
        })

    })

    //show details
    $(document).on('click','.btn_show_shoes_succes', function(){
        var id = $(this).attr('id');
        $.ajax({
            url: "../config/shoes.php",
            method: "POST",
            data: { check_view_data_shoes_success:id },
            dataType: "json",
            success:function(data){
                $('#show_shoes_brand').html(data.brand_name)
                $('#show_shoes_model').html(data.model)
                $('#show_shoes_color').html(data.color)
                $('#show_shoes_size').html(data.size)
                $('#show_shoes_amount').html(data.amount)
                $('#show_shoes_price').html(data.price)
                $('#show_shoes_description').html(data.star)
                $('#show_shoes_image1').attr('src', '../resource/uploads/' + data.image1)
                $('#show_shoes_image2').attr('src', '../resource/uploads/' + data.image2)
                $('#show_shoes_image3').attr('src', '../resource/uploads/' + data.image3)
                $('#show_shoes_image4').attr('src', '../resource/uploads/' + data.image4)
            }
        })
    })

// end shoes


// start brand shoes


   // show detail
   $(document).on('click','.btn_show_details_brand_shoes',function(){
       var id = $(this).attr('id');
       $.ajax({
        url: "../config/brand_shoes.php",
        method: "POST",
        data: { check_show_details_brand_shoes:id },
        success:function(data){
            $('#box_details_brand_shoes').html(data)
        }
       })
   });

   // insert brand shoes
    $('#btn_form_insert_brand_shoes').click(function(){
        $('#form_insert_brand_shoes').submit();
    });

    $('#form_insert_brand_shoes').on('submit',function(event){
        event.preventDefault();
        var formData = new FormData($('#form_insert_brand_shoes')[0]);
        $.ajax({
            url: "../config/brand_shoes.php",
            data: formData,
            contentType: false,
            processData: false,
            cache: false,
            type: 'POST',
            success:function(data){
                $('#form_insert_brand_shoes')[0].reset();
                $('#add_brand_shoes_modal').modal('hide');
                $('#show_brand_shoes').html(data);
                $('#bf_logo_upload').attr("src","");
            }
        });
    });

    // view data brand shoes
    $(document).on('click','.btn_view_brand_shoes',function(){
        var id = $(this).attr('id');  
        $.ajax({
            url: "../config/brand_shoes.php",
            method: "POST",
            data: {check_view_brand_shoes_success:id},
            dataType: "json",
            success:function(data){
                $('#view_brand_shoes_name').val(data.brand_name);
                $('#set_data_update_brand_shoes').val(data.brand_id);
                $('#set_data_delete_image').val(data.logo);
            }
        });
    });
    
    // edit brand shoes
    $('#btn_update_shoes_brand').click(function(){
        $('#form_edit_brand_shoes_success').submit();
    });

    $('#form_edit_brand_shoes_success').on('submit',function(event){
        event.preventDefault();
        var formData = new FormData($('#form_edit_brand_shoes_success')[0]);
        $.ajax({
            url: "../config/brand_shoes.php",
            data: formData,
            contentType: false,
            processData: false,
            cache: false,
            type: 'POST',
            success:function(data){
                $('#form_edit_brand_shoes_success')[0].reset();
                $('#edit_brand_shoes_modal').modal('hide');
                $('#show_brand_shoes').html(data);
            }
        });
    });

    // delete brand shoes
    $(document).on('click','.btn_delete_brand_shoes',function(event){
        event.preventDefault();
        var id = $(this).attr('id');
        $.ajax({
            url: "../config/brand_shoes.php",
            method: "POST",
            data: {check_delete_brand_shoes_success:id},
            success:function(data){
                $('#form_insert_brand_shoes')[0].reset();
                $('#show_brand_shoes').html(data);
            }
        });
    });

// end brand shoes

//******************************************************************************************

// javascript
function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      
      reader.onload = function(e) {
        $('#bf_logo_upload').attr('src', e.target.result);
      }
     
      reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
  }

  $("#change_logo").change(function() {
    readURL(this);
  });

});
