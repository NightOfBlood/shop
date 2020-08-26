$(document).ready(function () {
    $(".cart").click(function () {
        var id = $(this).attr("data-id");
        $.post("/cart/add/" + id, {}, function (data) {
            $("#cart-count").html(data);
        });
        return false;
    });
    let uuid = localStorage.getItem('shop_uuid');
    if (uuid == null) {
        localStorage.setItem('shop_uuid', guid());
        uuid = localStorage.getItem('shop_uuid');
    }

    $.post('/',
        /*{
                   'shop_uuid': uuid
               }*/
        "hello world"
    );
});

//возвращает уникальный идентификатор
function guid() {
    function s4() {
        return Math.floor((1 + Math.random()) * 0x10000)
            .toString(16)
            .substring(1);
    }
    return s4() + s4() + '-' + s4() + '-' + s4() + '-' +
        s4() + '-' + s4() + s4() + s4();
}