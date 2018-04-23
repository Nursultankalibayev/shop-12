$(document).ready(function () {
   $('header').on('click','.toggle-navbar',function () {
      var toggle = $(this).data('toggle');
      if (toggle == 0){
          $(this).addClass('open');
          $(this).data('toggle',1);
          $('.menu_header').addClass('menu_show').removeClass('menu_hide');

      }else{
          $(this).removeClass('open');
          $(this).data('toggle',0);
          $('.menu_header').addClass('menu_hide').removeClass('menu_show');
      }
   });

    $('.categories').on('click','.category p',function () {
        var toggle = $(this).data('toggle');
        if (toggle){
            $(this).parent().find('.category_menu_show').removeClass('category_menu_show');
            $(this).parent().find('.icon_category_open').removeClass('icon_category_open');
            $(this).data('toggle',0)
        }else{
            $(this).parent().find('.category_menu').addClass('category_menu_show');
            $(this).parent().find('.icon_category').addClass('icon_category_open');
            $(this).data('toggle',1)
        }
    });

    $('.galleries').each(function() { // the containers for all your galleries
        $(this).magnificPopup({
            delegate: 'a', // the selector for gallery item
            type: 'image',
            gallery: {
              enabled:true
            },
            removalDelay: 300,  mainClass: 'mfp-fade'

        })
    });
    $('.product').on('click','.minus',function () {
        var count = parseInt($('.counter').text());
        if (count >1) {
            $('.counter').text(count-1);
        }
    });
    $('.product').on('click','.plus',function () {
        var count = parseInt($('.counter').text());
        if (count < 10) {
            $('.counter').text(count+1);
        }
    });
    $('.basket_table').on('click','.minus',function () {
        var count = parseInt($(this).parent().find('.counter').text());
        var price = parseInt($(this).parent().parent().find('.parse_price').text());
        var all_price = parseInt($(this).parent().parent().find('.parse_all_price').text());
        var all_price_basket = parseInt($('#parse_basket_price').text());
        if (count >1) {
            $(this).parent().find('.counter').text(count-1);
            $(this).parent().parent().find('.parse_all_price').text(all_price-price);
            $('#parse_basket_price').text(all_price_basket-price);
        }
    });
    $('.basket_table').on('click','.plus',function () {
        var count = parseInt($(this).parent().find('.counter').text());
        var price = parseInt($(this).parent().parent().find('.parse_price').text());
        var all_price_basket = parseInt($('#parse_basket_price').text());
        if (count < 10) {
            $(this).parent().find('.counter').text(count+1);
            $(this).parent().parent().find('.parse_all_price').text((count+1)*price);
            $('#parse_basket_price').text(all_price_basket+price);
        }
    });

    $('.row').on('click','.min_product_item_img',function () {
        var v = $('.min_product_item_img').removeClass('active_min');
        $(this).addClass('active_min');
        var path = $(this).find('img').attr('src');
        if (path){
            $('#base_scr').attr('src',path);
        }
    });
});



$(document).ready(function (){
  // Declare Carousel jquery object
  var owl = $('.owl-carousel');

  // Carousel initialization
  owl.owlCarousel({
      loop:true,
      margin:0,
      navSpeed:500,
      nav:false,
      items:1
  });


  // add animate.css class(es) to the elements to be animated
  function setAnimation ( _elem, _InOut ) {
    // Store all animationend event name in a string.
    // cf animate.css documentation
    var animationEndEvent = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';

    _elem.each ( function () {
      var $elem = $(this);
      var $animationType = 'animated ' + $elem.data( 'animation-' + _InOut );

      $elem.addClass($animationType).one(animationEndEvent, function () {
        $elem.removeClass($animationType); // remove animate.css Class at the end of the animations
      });
    });
  }

// Fired before current slide change
  owl.on('change.owl.carousel', function(event) {
      var $currentItem = $('.owl-item', owl).eq(event.item.index);
      var $elemsToanim = $currentItem.find("[data-animation-out]");
      setAnimation ($elemsToanim, 'out');
  });

// Fired after current slide has been changed
  owl.on('changed.owl.carousel', function(event) {

      var $currentItem = $('.owl-item', owl).eq(event.item.index);
      var $elemsToanim = $currentItem.find("[data-animation-in]");
      setAnimation ($elemsToanim, 'in');
  })

});
$(document).ready(function() {
	$('.product_container').each(function() { // the containers for all your galleries
        $(this).magnificPopup({
            delegate: '.image-link', // the selector for gallery item
            type: 'image',
            gallery: {
              enabled:true
            }
        });
    });
});

