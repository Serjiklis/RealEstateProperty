<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\AmenitiesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Backend\PropertyTypeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\RoleController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

    //Group Admin Middleware
require __DIR__.'/auth.php';
Route::middleware(['auth','role:admin'])->group(function (){
    Route::get('/admin/dashboard',[AdminController::class, 'AdminDashboard'])
        ->name('admin.dashboard');
    Route::get('/admin/logout',[AdminController::class, 'AdminLogout'])
        ->name('admin.logout');
    Route::get('/admin/profile',[AdminController::class, 'AdminProfile'])
        ->name('admin.profile');
    Route::post('/admin/profile/store',[AdminController::class, 'AdminProfileStore'])
        ->name('admin.profile.store');
    Route::get('/admin/change/password',[AdminController::class, 'AdminChangePassword'])
        ->name('admin.change.password');
    Route::post('/admin/update/password',[AdminController::class, 'AdminUpdatePassword'])
        ->name('admin.update.password');
    Route::get('/admin/all/type',[AdminController::class, 'AdminChangePassword'])
        ->name('admin.all.type');
}); //End Group Admin Middleware

    //Group Agent Middleware
Route::middleware(['auth','role:agent'])->group(function (){
    Route::get('/agent/dashboard',[AgentController::class, 'AgentDashboard'])
        ->name('agent.dashboard');
});  //End Group Agent Middleware

Route::get('/admin/login',[AdminController::class, 'AdminLogin'])
    ->name('admin.login');

//Group Admin Middleware
Route::middleware(['auth','role:admin'])->group(function () {
    //Property Type All Route
    Route::controller(PropertyTypeController::class)->group(function () {
        Route::get('/all/type', 'AllType')->name('all.type');
        Route::get('/add/type', 'AddType')->name('add.type');
        Route::post('/store/type', 'StoreType')->name('store.type');
        Route::get('/edit/type/{id}', 'EditType')->name('edit.type');
        Route::post('/update/type', 'UpdateType')->name('update.type');
        Route::get('/delete/type/{id}', 'DeleteType')->name('delete.type');
    });

    //Amenities Type All Route
    Route::controller(AmenitiesController::class)->group(function () {
        Route::get('/all/amenities', 'AllAmenities')->name('all.amenities');
        Route::get('/add/amenity', 'AddAmenity')->name('add.amenity');
        Route::post('/store/amenities', 'StoreAmenities')->name('store.amenities');
        Route::get('/edit/amenity/{id}', 'EditAmenity')->name('edit.amenity');
        Route::post('/update/amenity', 'UpdateAmenity')->name('update.amenity');
        Route::get('/delete/amenity/{id}', 'DeleteAmenity')->name('delete.amenity');

    });

    //Permission  All Route
    Route::controller(RoleController::class)->group(function () {
        Route::get('/all/permission', 'AllPermission')->name('all.permission');
        Route::get('/add/permission', 'AddPermission')->name('add.permission');
        Route::post('/store/permission', 'StorePermission')->name('store.permission');
        Route::get('/edit/permission/{id}', 'EditPermission')->name('edit.permission');
        Route::post('/update/permission', 'UpdatePermission')->name('update.permission');
        Route::get('/delete/permission/{id}', 'DeletePermission')->name('delete.permission');
    });
});//End Group Admin Middleware
