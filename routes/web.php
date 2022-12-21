<?php

Broadcast::routes();

Route::put('notification-all-read', 'NotificationController@markAllAsRead')->name('notification.all.read');

Route::put('notification-read', 'NotificationController@markAsRead')->name('notification.read');

Route::get('notifications', 'NotificationController@notifications')->name('notifications');

Route::get('post/like/{id}', 'Likes\LikeController@create')->name('like.create');

Route::resource('post', 'Posts\PostController');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
