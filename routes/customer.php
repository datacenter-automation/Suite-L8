<?php

//Route::get('/', 'HomeController@index')->name('dashboard');
Route::view('/', 'dashboard')->middleware(['auth'])->name('dashboard');

Route::resource('machine', 'MachineController');
Route::resource('software', 'SoftwareController');
Route::resource('software-installed', 'SoftwareInstalledController');
Route::resource('ticket', 'TicketController');
Route::resource('ticket-attachment', 'TicketAttachmentController');
Route::resource('ticket-comment', 'TicketCommentController');
Route::resource('ticket-comment-attachment', 'TicketCommentAttachmentController');
Route::resource('feedback', 'FeedbackController');
Route::resource('message', 'MessageController');
Route::resource('upload', 'UploadController');
