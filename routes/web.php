<?php

use App\Models\User;

use App\Models\Event;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use PHPUnit\TextUI\XmlConfiguration\Group;
use App\Http\Controllers\MailController;
use App\Models\Categorie;

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
Route::group(['middleware'=>['is_admin']],function(){
Route::get('Admin', function(){
    return view('admin.app');})->name('admin');

Route::get('Admin/home', function(){
    return view('admin.home');})->name('admin_home');

Route::get('Admin/login', function(){
        return view('admin.login');})->name('admin_login');

Route::get('Admin/listOrganize', [\App\Http\Controllers\AdminController::class,"show"])->name('admin_listOrganize');

 Route::get('Admin/listTicket', function(){
                return view('admin.listTicket');})->name('admin_listTicket');

 Route::get('Admin/listevents', [\App\Http\Controllers\AdminController::class,"showEvents"])->name('admin_listEvents');
});


Route::get('/Massali/QuiSommesNous',function(){ return view ('infos');})->name('infos');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', function () {
$events=Event::all()->where('status',"=",1)->where("end_time",">",now())->take(3);
    return view('welcome',compact("events"));
});


Auth::routes();

Route::group(['middleware'=>['auth','is_client'],'prefix'=>'/messali/client' ],function(){

    Route::get("dashboard",[\App\Http\Controllers\DashboardController::class,"client"])->name('client_dashboard');
    Route::post("sale",[\App\Http\Controllers\CommandController::class,"sale_ticket"])->name('sale_ticket');
    Route::get("panier/show/",[\App\Http\Controllers\PanierController::class,"show"])->name('client_panier');
    Route::get("panier/add/{id}",[\App\Http\Controllers\PanierController::class,"add_ticket"])->name('add_ticket_to_panier');
    Route::get("panier/remove/{id}",[\App\Http\Controllers\PanierController::class,"remove_ticket"])->name('remove_ticket__from_panier');
    Route::get("panier/sale/{id}",[\App\Http\Controllers\PanierController::class,"sale"])->name('paid_all_from_panier');
    Route::get("panier/removeAll/{id}",[\App\Http\Controllers\PanierController::class,"remove_all"])->name('delete_all_from_panier');

});
Route::group(['middleware' => ['auth']],function(){
    Route::get('/event/new',[App\Http\Controllers\EventsController::class,"new"])->name("new_event");
    Route::post('/event/create',[App\Http\Controllers\EventsController::class,"create"])->name("create_event");
    Route::post('/event/update',[App\Http\Controllers\EventsController::class,"update"])->name("update_event");
    Route::get('/event/edit/{id}',[App\Http\Controllers\EventsController::class,"edit"])->name("edit_event");
    Route::get('/event/delete/{id}',[App\Http\Controllers\EventsController::class,"delete"])->name("delete_event");
    Route::get('/event/publish/{id}',[App\Http\Controllers\EventsController::class,"publish"])->name("publish_event");
    
    
    Route::post('/event/addimages',[App\Http\Controllers\FileUploadController::class,"fileUpload"])->name("add_images");
    Route::get('/image-upload/{i}', [App\Http\Controllers\FileUploadController::class, 'createForm'])->name("add_images_form");


    Route::get('/ticket/add/{id}',[App\Http\Controllers\TicketsController::class,"new"])->name('event_ticket_add');
    Route::get('/ticket/show/{id}',[App\Http\Controllers\TicketsController::class,"show"])->name('event_ticket_show');
    Route::get('/ticket/delete/{id}',[App\Http\Controllers\TicketsController::class,"delete"])->name('event_ticket_delete');
    Route::post('/ticket/update',[App\Http\Controllers\TicketsController::class,"update"])->name('event_ticket_update');
    Route::post('/ticket/create',[App\Http\Controllers\TicketsController::class,"create"])->name('event_ticket_create');
    Route::get('/ticket/edit/{id}',[App\Http\Controllers\TicketsController::class,"edit"])->name('event_ticket_edit');

    Route::get('/portemonnaie/new/{id}/{price}',[App\Http\Controllers\PortemonnaieController::class,"new"])->middleware(['is_client'])->name('new_portemonnaie');
    Route::post('/portemonnaie/create',[App\Http\Controllers\PortemonnaieController::class,"create"])->name('portemonnaie_ticket_create');
    Route::get('/portemonnaie/edit/{id}',[App\Http\Controllers\PortemonnaieController::class,"edit"])->name('portemonnaie_edit');
    Route::post('/portemonnaie/update',[App\Http\Controllers\PortemonnaieController::class,"update"])->name('portemonnaie_update');
    Route::get('/commande/publish/{id}',[App\Http\Controllers\CommandController::class,"publish"])->name("publish_commande");


});

Route::group(['middleware' => ['auth','is_organizer']],function(){
    Route::get("/messali/organizer/dashboard",[\App\Http\Controllers\DashboardController::class,"organizer"])->name('organizer_dashboard');
    Route::post('/messali/new/promotor',[\App\Http\Controllers\DashboardController::class,"store_promotor"])->name("add_promotor");
});

Route::get('/search',[App\Http\Controllers\EventsController::class,"search"])->name("search_event");

//Route::post('/search/transaction',[App\Http\Controllers\TransactionsController::class,"search_transaction"])->name("search_achat");

Route::get('/emails/TestMail', [MailController::class, 'contact_mail'])->name('send-mail');
Route::post('/emails/TestMail', [MailController::class, 'contact_mail'])->name('send-mail');



Route::get('/ticket/index/{id}',[App\Http\Controllers\TicketsController::class,"index"])->name('event_ticket_all');
Route::get('/event/show/{id}',[App\Http\Controllers\EventsController::class,"show"])->name("show_event");
Route::get("/events",[App\Http\Controllers\EventsController::class,"events"])->name("events");


Route::get("/messali/promotor/dashboard",[\App\Http\Controllers\DashboardController::class,"promotor"])->middleware(['is_promotor'])->name('promotor_dashboard');




