var Product = {
  addBasket : function (el) {
    var product = el.data('id');
    var token = $('meta[name="csrf-token"]').attr('content');
    $.post('/add-basket',{product:product,_token:token},function (response) {
       if(response.success){
          el.addClass('active-product');
          toastr.success(response.message);
          var topCounter = parseInt($('.bottom_header_basket span').text());
          $('.bottom_header_basket span').text(topCounter+1);
       }else{
           toastr.error(response.message);
       }
    });
  },
    addDetailBasket : function (el) {
    var product = el.data('id');
    var token = $('meta[name="csrf-token"]').attr('content');
    var counter = el.parent().find('.counter').text();
    $.post('/add-basket',{product:product,_token:token,counter:counter},function (response) {
       if(response.success){
          el.addClass('active-product');
          el.text('Добавлено');
          var topCounter = parseInt($('.bottom_header_basket span').text());
          $('.bottom_header_basket span').text(topCounter+1);
          toastr.success(response.message);
       }else{
           toastr.error(response.message);
       }
    });
  },
    deleteProductBasket : function (el) {
        var product = el.data('id');
        var token = $('meta[name="csrf-token"]').attr('content');
        $.post('/delete-basket',{product:product,_token:token},function (response) {
           if(response.success){
              el.parent().parent().hide();
              toastr.success(response.message);
              var topCounter = parseInt($('.bottom_header_basket span').text());
              $('.bottom_header_basket span').text(topCounter-1);
              var allPrice = parseInt($('#parse_basket_price').text());
              var price = parseInt($('#item-'+product).text());
              console.log(allPrice);
              console.log(price);
              $('#parse_basket_price').text(allPrice-price);
           }else{
               toastr.error(response.message);
           }
        });
    },
    deleteProductBasket : function () {
        var product = $(".basket_table");
        var all_product = {};
        for(var i=0;i<product.length;i++) {
            all_product[i]= {product_id : product.eq(i).data('id'),count : product.eq(i).find('.counter').text()};
        }
        console.log(all_product);
        var token = $('meta[name="csrf-token"]').attr('content');
       $.post('/orders-basket',{products:all_product,_token:token},function (response) {
           if(response.success){
              toastr.success(response.message);
               $('#baskets').html('');
               $('#parse_basket_price').text(0);
               $('.bottom_header_basket span').text(0);
               $('#modalOrder').modal('show');
           }else{
               toastr.error(response.message);
           }
        });
    }
};