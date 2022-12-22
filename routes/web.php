<?php

Broadcast::routes();

Route::post('/comment', 'Comment\CommentController@store')->name('comment.store');

Route::put('/load-likes', 'Likes\LikeController@loadLikes')->name('like.load');

Route::put('/likes', 'Likes\LikeController@likes')->name('like');

Route::put('notification-all-read', 'NotificationController@markAllAsRead')->name('notification.all.read');

Route::put('notification-read', 'NotificationController@markAsRead')->name('notification.read');

Route::get('post/delete/{id}', 'Posts\PostController@delete')->name('post.delete');

Route::get('notifications', 'NotificationController@notifications')->name('notifications');

Route::resource('post', 'Posts\PostController');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
