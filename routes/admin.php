<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Admin_panel_settingsController;


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

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'auth:admin'], function () {
   Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
   Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

      
/*           بداية الضبط العام  (admin panel setting)                */

         Route::get('/adminpanelsetting/index',[Admin_panel_settingsController::class,'index'])->name('admin.adminPanelSetting.index');
         Route::get('/adminpanelsetting/edit',[Admin_panel_settingsController::class,'edit'])->name('admin.adminPanelSetting.edit');
         Route::post('/adminpanelsetting/update',[Admin_panel_settingsController::class,'update'])->name('admin.adminPanelSetting.update');
/*           end  (admin panel setting)                  */
        



});


Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'guest:admin'], function () {

   Route::get('login', [LoginController::class, 'show_login_view'])->name('admin.showlogin');
   Route::post('login', [LoginController::class, 'login'])->name('admin.login');
});
Route::fallback(function(){
  return redirect()->route('admin.showlogin');


  
});

