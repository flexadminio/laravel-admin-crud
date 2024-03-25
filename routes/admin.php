<?php

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

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AttachmentController;
use App\Http\Controllers\Admin\Product\Bulk\StatusController;
use App\Http\Controllers\Admin\Resource\Bulk\DeleteResourcesController as BulkDeleteResourcesController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\DashboardController;

Route::group(['middleware' => ['auth'], 'prefix' => 'admin'], function() {
  Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

  Route::get('/attachments', [AttachmentController::class, 'create'])->name('attachments.create');
  Route::get('/attachments/{id?}', [AttachmentController::class, 'edit'])->name('attachments.edit');
  Route::put('/attachments/{id?}', [AttachmentController::class, 'update'])->name('attachments.update');
  Route::post('/attachments/{attachable_type?}/{attachable_id?}', [AttachmentController::class, 'store'])->name('attachments.store');
  Route::delete('/attachments/{id?}', [AttachmentController::class, 'destroy'])->name('attachments.destroy');

  Route::controller(StatusController::class)->group(function () {
    Route::get('/product/bulk/status', 'create')->name('product.bulk.status');
    Route::put('/product/bulk/status', 'update')->name('product.bulk.status.update');
  });

  Route::controller(BulkDeleteResourcesController::class)->group(function () {
    Route::get('/resources/bulk/delete/{resource_type?}', 'create')->name('resources.bulk.delete.create');
    Route::delete('/resources/bulk/delete', 'destroy')->name('resources.bulk.delete.delete');
  });

  Route::resource('roles', RoleController::class);
  Route::resource('users', UserController::class);
  Route::resource('products', ProductController::class);
  Route::resource('tags', TagController::class);
  Route::resource('categories', CategoryController::class);

  require __DIR__.'/admin_generator.php';
});
