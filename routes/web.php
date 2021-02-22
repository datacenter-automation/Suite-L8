<?php

use App\Http\Controllers\Site\{ContactController, DocumentationController, ProductController, SolutionController,};
use Illuminate\Support\Facades\Route;

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

Route::view('/test', 'test'); // remove
Route::get('/user/update', function() {
    return Request::all();
})->name('user.update');

Route::view('/', 'welcome');

Route::get('/lang/{lang}', 'LanguagePreferenceController@setLanguage');

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

//Route::group([
//    'prefix' => 'dashboard',
//], function () {
//    Route::view('/', 'dashboard')->middleware(['auth'])->name('dashboard');
//
//
//    Route::resource('machine', MachineController::class);
//    Route::resource('machinetype', MachineTypeController::class);
//    Route::resource('ticket', TicketController::class);
//    Route::resource('machinelog', MachineLogController::class);
//    Route::resource('ticketlog', TicketLogController::class);
//    Route::resource('ticketcomments', TicketCommentsController::class);
//    Route::resource('user', UserController::class);
//    Route::resource('ticketworkers', TicketWorkersController::class);
//    Route::resource('software', SoftwareController::class);
//    Route::resource('softwarecategory', SoftwareCategoryController::class);
//    Route::resource('softwareinstalled', SoftwareInstalledController::class);
//    Route::resource('machinenotes', MachineNotesController::class);
//    Route::resource('machinenoteattachments', MachineNoteAttachmentsController::class);
//    Route::resource('ticketattachments', TicketAttachmentsController::class);
//    Route::resource('ticketcommentattachments', TicketCommentAttachmentsController::class);
//    Route::resource('ticketstatus', TicketStatusController::class);
//    Route::resource('location', LocationController::class);
//    Route::resource('locationgroup', LocationGroupController::class);
//
//    Route::prefix('/pdf')->group(function () {
//        Route::get('preview', [PdfController::class, 'preview']);
//        Route::get('download', [PdfController::class, 'download'])->name('download');
//    });
//});
