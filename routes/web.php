<?php




Route::group(['namespace'=>'Admin','middleware'=>'web'],function(){
   Route::get('/login','AdminController@getLogin')->name('login');
   Route::post('login','AdminController@postLogin')->name('postLogin');
   Route::get('/logout','AdminController@logout')->name('getLogout');
   Route::get('/admin','AdminController@main')->name('dashboard');

});

Route::group(['prefix'=>'admin','middleware'=>'web','namespace'=>'Admin'],function(){
    Route::resource('/carousel','CarouselController');
    Route::resource('/category','CategoryController');
    Route::resource('/product','ProductController');
    Route::resource('/gallery','GalleryController');
    Route::resource('/page','PageController');
    Route::post('/category-file-delete','CategoryController@categoryFileDelete');
    Route::post('/product-file-delete','ProductController@productFileDelete');
    Route::post('/order-delete','OrderController@orderDelete');
    Route::get('/order','OrderController@getOrders');
    Route::get('/order/{id}','OrderController@getOrderSingle');
    Route::get('/callback','OrderController@getCallback');
    Route::post('/callback-delete','OrderController@deleteCallback');

});

Route::group(['middleware'=>'web','namespace'=>'Index'],function(){
    Route::get('/','IndexController@index');
    Route::get('/category/{category}/{pod_category?}','IndexController@getCategoryProduct');
    Route::get('/product/{slug}','IndexController@getProduct');
    Route::get('/sales','IndexController@getSalesProduct');
    Route::get('/gallery','IndexController@getGallery');
    Route::get('/page/{slug}','IndexController@getPage');
    Route::get('/basket','IndexController@basket');
    Route::get('/search','IndexController@search');
    Route::post('/auth/registration','AuthController@registration');
    Route::post('/auth/login','AuthController@login');
    Route::post('/send-callback','AuthController@callback');
    Route::get('/auth/logout','AuthController@logout');
    Route::post('/add-basket','OrderController@addBasket');
    Route::post('/delete-basket','OrderController@deleteBasket');
    Route::post('/orders-basket','OrderController@OrdersBasket');
});