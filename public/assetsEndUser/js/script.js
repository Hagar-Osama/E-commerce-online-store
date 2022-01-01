$(document).ready(function() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var product_id =  $("#product_id").val();
    var size_id =  $("#size_id").val();
    var color_id =  $("#color_id").val();

    $("#wishlist").click(function(event){
        event.preventDefault();

        data = {'product_id': product_id, 'size_id':size_id, 'color_id':color_id};

        $.ajax({
            type:'POST',
            url: '/user/wishlist',
            data: data,
            success: function (response){
                $("#msg").append(`<p>Product Was Added</p>`);
            }
        })
    });

    $("#add_to_cart").click(function(){

        var stock =  $("#stock").val();

        data = {'product_id': product_id, 'size_id':size_id, 'color_id':color_id, 'stock':stock};

        $.ajax({
            type:'POST',
            url: '/user/cart',
            data: data,
            success: function (response){
                if(response == 0)
                {
                    var cartCounter = parseInt($("#cart-total").html() )+ 1;
                    console.log(cartCounter);
                    $("#cart-total").html(cartCounter);
                }

                $("#msg").append(`<p>Product Was Added To Cart</p>`);
            }
        })
    });

});
