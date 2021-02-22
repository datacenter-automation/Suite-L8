<?php

use App\Http\Controllers\EmployeeController;

Route::resource('location', 'LocationController');
Route::resource('location-group', 'LocationGroupController');
Route::resource('machine-log', 'MachineLogController');
Route::resource('machine-note', 'MachineNoteController');
Route::resource('machine-note-attachment', 'MachineNoteAttachmentController');
Route::resource('machine-type', 'MachineTypeController');
Route::resource('software-category', 'SoftwareCategoryController');
Route::resource('ticket-log', 'TicketLogController');
Route::resource('ticket-status', 'TicketStatusController');
Route::resource('ticket-worker', 'TicketWorkerController');
Route::resource('auth-log', 'AuthLogController');
Route::resource('logger', 'LoggerController');


Route::get('/employee', [EmployeeController::class, 'index']);
Route::get('/employee/pdf', [EmployeeController::class, 'createPDF'])->name('internal.pdf.create');
