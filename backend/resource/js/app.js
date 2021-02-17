
//******************************************************************************************
// jquery

$(document).ready(function(){

// start shoes
    
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
            url: "",
            method: "POST",
            data: {check_search_shoes:1 ,key:key, type:type},
            success:function(data){

            }
        })

    })

// end shoes


// start brand shoes

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
