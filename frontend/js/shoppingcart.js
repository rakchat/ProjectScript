calTotalPrice();

function calTotalPrice(){
    var el_amount = document.getElementsByClassName("amount");
    var el_price = document.getElementsByClassName("price");
    var el_set_price = document.getElementsByClassName("set_price");
    var el_set_amount = document.getElementsByClassName("set_amount");
    var el_show_price = document.getElementsByClassName("show_price");
    var amount = 0;
    var price = 0;
    var total = 0;
    var total_price = 0;

    for(var i = 0; i < el_amount.length; i++){
        price = el_price[i].value;
        amount = el_amount[i].value;

        total = price * amount;
        total_price += total;

        el_set_amount[i].value = amount;
        el_set_price[i].value = total;
        el_show_price[i].innerHTML = (Math.round(total * 100) / 100).toFixed(2) + " บาท.";

    }

    document.getElementById('show_total').value = (Math.round(total_price * 100) / 100).toFixed(2);
    document.getElementById("get_total_price").value = total_price;

}

$(document).ready(function(){
    $(document).on('click','.btn_delete_session', function(){
        var id = $(this).attr('id');
        $.ajax({
            url: "config/session.php",
            method: "POST",
            data:{check_detele_session:id},
            success:function(data){
                $('.box_view_cart').html(data);
                calTotalPrice();
            }
        })
    })
})
