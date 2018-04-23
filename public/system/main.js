$(document).ready(function () {
    $('.carousel-delete').on('click', function () {
        var id = $(this).data('id');
        var token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: "/admin/carousel/" + id,
            type: "POST",
            data: {
                "_token": token,
                "_method": "DELETE",
                "id": id
            }, success: function (data) {
                if (data.success)
                    $('.item-' + id).hide();
            }
        });
    });
    $('.category-delete').on('click', function () {
        var id = $(this).data('id');
        var token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: "/admin/category/" + id,
            type: "POST",
            data: {
                "_token": token,
                "_method": "DELETE",
                "id": id
            }, success: function (data) {
                if (data.success)
                    $('.item-' + id).hide();
            }
        });
    });
    $('.product-delete').on('click', function () {
        var id = $(this).data('id');
        var token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: "/admin/product/" + id,
            type: "POST",
            data: {
                "_token": token,
                "_method": "DELETE",
                "id": id
            }, success: function (data) {
                if (data.success)
                    $('.item-' + id).hide();
            }
        });
    });
    $('.gallery-delete').on('click', function () {
        var id = $(this).data('id');
        var token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: "/admin/gallery/" + id,
            type: "POST",
            data: {
                "_token": token,
                "_method": "DELETE",
                "id": id
            }, success: function (data) {
                if (data.success)
                    $('.item-' + id).hide();
            }
        });
    });
    $('.page-delete').on('click', function () {
        var id = $(this).data('id');
        var token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: "/admin/page/" + id,
            type: "POST",
            data: {
                "_token": token,
                "_method": "DELETE",
                "id": id
            }, success: function (data) {
                if (data.success)
                    $('.item-' + id).hide();
            }
        });
    });
     $('.category-image-delete').on('click',function () {
        var category = $(this).data('category');
        var type = $(this).data('type');
        var el = $(this);
        var token =$('meta[name="csrf-token"]').attr('content');
        $.ajax({
                url:"/admin/category-file-delete",
                type: "POST",
                data:{
                    "_token" : token,
                    "category":category,
                    "type":type
                },success:function(data){
                    if (data.success) el.parent().hide();
                }
            });
    });
     $('.category-images-delete').on('click',function () {
        var category = $(this).data('category');
        var type = $(this).data('type');
        var el = $(this);
        var token =$('meta[name="csrf-token"]').attr('content');
        $.ajax({
                url:"/admin/category-file-delete",
                type: "POST",
                data:{
                    "_token" : token,
                    "category":category,
                    "type":type
                },success:function(data){
                    if (data.success) el.parent().hide();
                }
            });
    });
     $('.product-images-delete').on('click',function () {
        var id = $(this).data('image');
        var el = $(this);
        var token =$('meta[name="csrf-token"]').attr('content');
        $.ajax({
                url:"/admin/product-file-delete",
                type: "POST",
                data:{
                    "_token" : token,
                    "id":id
                },success:function(data){
                    if (data.success) el.parent().hide();
                }
            });
    });
     $('.order-delete').on('click',function () {
        var id = $(this).data('id');
        var el = $(this);
        var token =$('meta[name="csrf-token"]').attr('content');
        $.ajax({
                url:"/admin/order-delete",
                type: "POST",
                data:{
                    "_token" : token,
                    "id":id
                },success:function(data){
                    if (data.success) el.parent().parent().hide();
                }
            });
    });
     $('.callback-delete').on('click',function () {
        var id = $(this).data('id');
        var el = $(this);
        var token =$('meta[name="csrf-token"]').attr('content');
        $.ajax({
                url:"/admin/callback-delete",
                type: "POST",
                data:{
                    "_token" : token,
                    "id":id
                },success:function(data){
                    if (data.success) el.parent().parent().parent().hide();
                }
            });
    });

});