$(document).ready(function(){
    $('#key_search').keyup(function(){
        var key = $(this).val();
        $.ajax({
            url: "config/index.php",
            method: "POST",
            data: { check_search_by_textbox:key},
            success:function(data){
                $("#box_view_all_product").html(data);
            }
        })
    })

    $('.btn_seach_form_brand').click(function(){
        var key = $(this).attr('id');
        $.ajax({
            url: "config/index.php",
            method: "POST",
            data: { check_search_by_brand_id:key},
            success:function(data){
                $("#box_view_all_product").html(data);
            }
        })
    })
})