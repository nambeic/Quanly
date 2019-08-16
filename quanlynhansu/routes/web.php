<?php
Route::get('/', function () {
return view('dangnhap');
});
Route::resource('danhsach', 'QuanLyController');
Route::get('dangnhap','LoginController@getLogin')->name('login');
Route::post('dangnhap','LoginController@postLogin');
Route::get('dangxuat','LogoutController@getLogout');