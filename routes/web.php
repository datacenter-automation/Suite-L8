<?php

use App\Http\Controllers\LocationController;
use App\Http\Controllers\LocationGroupController;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\MachineLogController;
use App\Http\Controllers\MachineNoteAttachmentsController;
use App\Http\Controllers\MachineNotesController;
use App\Http\Controllers\MachineTypeController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\SoftwareCategoryController;
use App\Http\Controllers\SoftwareController;
use App\Http\Controllers\SoftwareInstalledController;
use App\Http\Controllers\TicketAttachmentsController;
use App\Http\Controllers\TicketCommentAttachmentsController;
use App\Http\Controllers\TicketCommentsController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TicketLogController;
use App\Http\Controllers\TicketStatusController;
use App\Http\Controllers\TicketWorkersController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\{
    ContactController,
    DocumentationController,
    PricingController,
    ProductController,
    SolutionController,
    SupportController,
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require __DIR__.'/auth.php';

Route::view('/test', 'test'); // remove

Route::view('/', 'welcome');

Route::group(['prefix' => 'site'], function () {
    Route::view('/about', 'site.about');

    Route::get('/contact', [ContactController::class, 'index']);  
    Route::post('/contact', [ContactController::class, 'create']);      

    Route::get('/docs', [DocumentationController::class, 'index']);
    Route::get('/docs/{doc}', [DocumentationController::class, 'show']);

    // Route::get('/pricing', [PricingController::class, 'index']);
    Route::view('/pricing', 'site.pricing');

    Route::get('/products', [ProductController::class, 'index']);

    Route::get('/solutions', [SolutionController::class, 'index']);
    
    Route::get('/solution/{solution}', [SolutionController::class, 'show']);

    Route::view('/support', 'site.support');
    // Route::get('/support', SupportController::class);

    Route::view('/inbox', 'site.inbox');
});

Route::group([
    'prefix' => 'dashboard',
], function () {
    Route::view('/', 'dashboard')->middleware(['auth'])->name('dashboard');


    Route::resource('machine', MachineController::class);
    Route::resource('machinetype', MachineTypeController::class);
    Route::resource('ticket', TicketController::class);
    Route::resource('machinelog', MachineLogController::class);
    Route::resource('ticketlog', TicketLogController::class);
    Route::resource('ticketcomments', TicketCommentsController::class);
    Route::resource('user', UserController::class);
    Route::resource('ticketworkers', TicketWorkersController::class);
    Route::resource('software', SoftwareController::class);
    Route::resource('softwarecategory', SoftwareCategoryController::class);
    Route::resource('softwareinstalled', SoftwareInstalledController::class);
    Route::resource('machinenotes', MachineNotesController::class);
    Route::resource('machinenoteattachments', MachineNoteAttachmentsController::class);
    Route::resource('ticketattachments', TicketAttachmentsController::class);
    Route::resource('ticketcommentattachments', TicketCommentAttachmentsController::class);
    Route::resource('ticketstatus', TicketStatusController::class);
    Route::resource('location', LocationController::class);
    Route::resource('locationgroup', LocationGroupController::class);

    Route::prefix('/pdf')->group(function () {
        Route::get('preview', [PdfController::class, 'preview']);
        Route::get('download', [PdfController::class, 'download'])->name('download');
    });
});
