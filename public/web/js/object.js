var FuncObject = {
    showModalCallback : function () {
        $('#modalCallback').modal();
    },
    showRegistration : function () {
        $('#modalRegistration').modal('show');
    },
    showLogin : function () {
        $('#modalLogin').modal('show');
    },
    sendCallback : function () {
        var name = $("#nameCallback").val();
        var phone = $("#phoneCallback").val();
        var token = $('meta[name="csrf-token"]').attr('content');
         $.post('/send-callback',{
            name:name,
            phone:phone,
            _token:token
        },function (response) {
            if (!response.success){
                toastr.error(response.error);
            }else if(response.success){
                $('#modalCallback').modal('hide');
                toastr.success(response.message);
            }
        });
    },
    sendLogin : function () {
        var email = $("#email1").val();
        var password = $("#password1").val();
        var token = $('meta[name="csrf-token"]').attr('content');
         $.post('/auth/login',{
            email:email,
            password:password,
            _token:token
        },function (response) {
            if (!response.success){
                toastr.error(response.error);
            }else if(response.success){
                $('#modalLogin').modal('hide');
                $('.top_header_button').html('<button><i></i>'+response.message+'</button><button onclick=window.location.href="/auth/logout";><i class="icon_login"></i>Выход</button>');
                toastr.info(response.message);
            }
        });
    },
    sendRegistration : function () {
        var first_name = $("#first_name").val();
        var last_name = $("#last_name").val();
        var email = $("#email").val();
        var phone = $("#phone").val();
        var password = $("#password").val();
        var password_confirmation = $("#password_confirmation").val();
        var token = $('meta[name="csrf-token"]').attr('content');
        $.post('/auth/registration',{
            first_name : first_name,
            last_name:last_name,
            email:email,
            phone:phone,
            password:password,
            password_confirmation:password_confirmation,
            _token:token
        },function (response) {
            if (!response.success){
              $.each(response.errors , function (i, n) {
                    toastr.error(n);
              });
            }else if(response.success){
                $('#modalRegistration').modal('hide');
                $('.top_header_button').html('<button><i class="icon_registration"></i>'+response.message+'</button><button onclick=window.location.href="/auth/logout";><i class="icon_login"></i>Выход</button>');
                toastr.info(response.message);
            }
        });
    }
};