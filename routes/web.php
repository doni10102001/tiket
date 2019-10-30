<?php


Route::get('/', function () {
	return view('welcome');
});

Auth::routes();


Route::group(['prefix' => 'admin'], function(){
	// Login Admin
	Route::get('/login', 'Auth\AdminLoginController@show')->name('admin');
	Route::post('/login/store', 'Auth\AdminLoginController@login')->name('admin-login');
	// Dashboard Admin
	Route::get('/', 'Admin\AdminController@index')->name('admin.dashboard');	
	// Manage Category
	Route::get('/manage-category', 'Admin\ManageCategoryController@index')->name('admin.manage-category');
	Route::get('/manage-category/data', 'Admin\ManageCategoryController@CategoryDatatables')->name('admin.manage-category.data');
	Route::get('/manage-category/add', 'Admin\ManageCategoryController@CategoryCreate')->name('admin.manage-category.add');
	Route::get('/manage-category/{id}/edit', 'Admin\ManageCategoryController@CategoryEdit')->name('admin.manage-category.edit');
	Route::get('/manage-category/{id}/preview', 'Admin\ManageCategoryController@CategoryShow')->name('admin.manage-category.show');
	Route::post('/manage-category/store', 'Admin\ManageCategoryController@store')->name('admin.manage-category.store');
	Route::delete('/manage-category/{id}/delete', 'Admin\ManageCategoryController@delete')->name('admin.manage-category.delete');
	// Manage Maskapai
	Route::get('/manage-maskapai', 'Admin\ManageMaskapaiController@index')->name('admin.manage-maskapai');
	Route::get('/manage-maskapai/data', 'Admin\ManageMaskapaiController@MaskapaiDatatables')->name('admin.manage-maskapai.data');
	Route::get('/manage-maskapai/add', 'Admin\ManageMaskapaiController@MaskapaiCreate')->name('admin.manage-maskapai.add');
	Route::get('/manage-maskapai/{id}/edit', 'Admin\ManageMaskapaiController@MaskapaiEdit')->name('admin.manage-maskapai.edit');
	Route::get('/manage-maskapai/{id}/preview', 'Admin\ManageMaskapaiController@MaskapaiShow')->name('admin.manage-maskapai.show');
	Route::post('/manage-maskapai/store', 'Admin\ManageMaskapaiController@store')->name('admin.manage-maskapai.store');
	Route::delete('/manage-maskapai/{id}/delete', 'Admin\ManageMaskapaiController@delete')->name('admin.manage-maskapai.delete');
	// Manage Member
	Route::get('/manage-member', 'Admin\ManageMemberController@index')->name('admin.manage-member');
	Route::get('/manage-member/data', 'Admin\ManageMemberController@MemberDatatables')->name('admin.manage-member.data');
	Route::get('/manage-member/{id}/edit', 'Admin\ManageMemberController@MemberEdit')->name('admin.manage-member.edit');
	Route::get('/manage-member/{id}/preview', 'Admin\ManageMemberController@MemberShow')->name('admin.manage-member.show');
	Route::post('/manage-member/store', 'Admin\ManageMemberController@store')->name('admin.manage-member.store');
	Route::delete('/manage-member/{id}/delete', 'Admin\ManageMemberController@delete')->name('admin.manage-member.delete');
	// Manage Ticket
	Route::get('/manage-ticket', 'Admin\ManageTicketsController@index')->name('admin.manage-ticket');
	Route::get('/manage-ticket/data', 'Admin\ManageTicketsController@ManageTicketDatatables')->name('admin.manage-ticket.data');
	Route::get('/manage-ticket/add', 'Admin\ManageTicketsController@TicketCreate')->name('admin.manage-ticket.add');
	Route::get('/manage-ticket/{id}/edit', 'Admin\ManageTicketsController@TicketEdit')->name('admin.manage-ticket.edit');
	Route::get('/manage-ticket/{id}/preview', 'Admin\ManageTicketsController@TicketShow')->name('admin.manage-ticket.show');
	Route::post('/manage-ticket/store', 'Admin\ManageTicketsController@store')->name('admin.manage-ticket.store');
	Route::delete('/manage-ticket/{id}/delete', 'Admin\ManageTicketsController@delete')->name('admin.manage-ticket.delete');
	// Manage Reservation
	Route::get('/manage-reservasi', 'Admin\ManageReservationController@index')->name('admin.manage-reservation');
	Route::get('/manage-reservasi/data', 'Admin\ManageReservationController@ReservasiDatatables')->name('admin.manage-reservation.data');
	Route::get('/manage-reservasi/{id}/edit', 'Admin\ManageReservationController@editReservasi')->name('admin.manage-reservation.edit');
	Route::get('/manage-reservasi/{id}/preview', 'Admin\ManageReservationController@editReservasi')->name('admin.manage-reservation.preview');
	Route::post('/manage-reservasi/store', 'Admin\ManageReservationController@store')->name('admin.manage-reservation.store');
	Route::delete('/manage-reservasi/{id}/delete', 'Admin\ManageReservationController@delete')->name('admin.manage-reservation.delete');
	// Manage Notification
	Route::get('/manage-info', 'Admin\ManageNotificationController@index')->name('admin.manage-info');
	Route::get('/manage-info/data', 'Admin\ManageNotificationController@infoDatatables')->name('admin.manage-info.data');
	Route::get('/manage-info/tambah', 'Admin\ManageNotificationController@create')->name('admin.manage-info.tambah');
	Route::get('/manage-info/{id}/edit', 'Admin\ManageNotificationController@edit')->name('admin.manage-info.edit');
	Route::post('/manage-info/store', 'Admin\ManageNotificationController@store')->name('admin.manage-info.store');
	Route::delete('/manage-info/{id}/delete', 'Admin\ManageNotificationController@delete')->name('admin.manage-info.delete');
	//Manage Message
	Route::get('/manage-message', 'Admin\ManageMessageController@index')->name('admin.manage-message');
	Route::get('/manage-message/data', 'Admin\ManageMessageController@ManageMessageDatatables')->name('admin.manage-message.data');
	Route::delete('/manage-message/{id}/delete', 'Admin\ManageMessageController@delete')->name('admin.manage-message.delete');
	// Profile
	Route::get('/profile/{id}','Admin\AdminController@show')->name('admin.profile');
	Route::post('/profile/{id}/update', 'Admin\AdminController@store')->name('admin.profile.store');
});

Route::group(['prefix' => 'user'], function(){
	// Dashboard User
	Route::get('/', 'HomeController@index')->name('home');	
	// Cari Tiket
	Route::get('/cari-tiket', 'User\TicketController@cariTiket')->name('user.cari-tiket');
	Route::post('/search-ticket', 'User\TicketController@search')->name('user.search');
	// Detail Ticket
	Route::get('/detail-ticket/{id}', 'User\TicketController@show')->name('user.show-ticket');
	// Tiket
	Route::get('/cari-tiket/all','User\TicketController@viewAll')->name('user.cari-tiket.all');
	// Tiket Saya
	Route::get('/tiket-saya/all', 'User\TicketController@viewMyTicket')->name('user.tiket-saya.all');
	// Detail Tiket Yang Sudah Di Pesan
	Route::get('/tiket-saya/{id}', 'User\TicketController@myTicket')->name('user.tiket-saya');
	// Reservation
	Route::get('/reservation/{id}/pesan', 'User\ReservationController@view')->name('user.reserve');
	Route::post('/reservation/{id}/order', 'User\ReservationController@book')->name('user.booking');
	// Cancel Ticket
	Route::delete('reservation/delete/{id}','User\ReservationController@delete')->name('user.reserve.delete');
	// Pdf
	Route::get('/reservation/{id}/download', 'User\ReservationController@pdf')->name('user.reserve.pdf');
	// Update Profile
	Route::get('/profile/{id}','User\ProfileController@show')->name('user.profile');
	Route::post('/profile/update/{id}','User\ProfileController@store')->name('user.profile-store');
	// Message
	Route::post('/message', 'User\MessageController@store')->name('user.message');
});
