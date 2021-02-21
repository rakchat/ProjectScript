$(document).ready(function(){
    // oder show order details 
$(document).on('click', '.btn_order_show_orders_details', function(){
    var id = $(this).attr('id')
    
    $.ajax({
        url: "config/order.php",
        method: "POST",
        data: { check_order_show_order_details:id },
        success:function(data){
            $('#box_view_orders_order_details').html(data);
        }
    })
})
})