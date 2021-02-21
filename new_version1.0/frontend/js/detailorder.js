$(document).ready(function(){
    $('#btn_check_user').click(function(){
        var user = $('#value_user_id').val();
        var id = $('#send_id_page').val(); 
        if(user == 1){
            $('#add_shoes_to_cart').submit();
        }else{
            $('#modal_login').modal('show')
            $('#set_id_page').val(id)
        }
    })
})