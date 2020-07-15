function deleteOrder(sn){
    if(window.confirm("確定刪除訂單?")){
        $.post('../api/deleteOrder.php', {order_id: sn}, function(data){
            console.log(data.result);
            if(data.result){
                location.reload();
            }else{
                console.log(data.msg);
            }
        }, "json");
    }
}
$('.addBtn').on('click', function(e){
    e.preventDefault();
    location.href = "order_form.php";
})