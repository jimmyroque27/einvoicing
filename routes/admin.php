<?php
use Illuminate\Support\Facades\Route;

Route::group([
    'namespace'  => 'App\Http\Controllers\Admin',
    'prefix'     => 'admin',
    'middleware' => ['auth'],
], function () {
    // Route::resource('permission', 'PermissionController');


    Route::get('permission', [App\Http\Controllers\Admin\PermissionController::class, 'index'])->name('admin.permission.index');
    Route::get('permission/create', [App\Http\Controllers\Admin\PermissionController::class, 'create'])->name('admin.permission.create');
    Route::post('permission/store', [App\Http\Controllers\Admin\PermissionController::class, 'store'])->name('admin.permission.store');
    Route::get('permission/edit/{id}', [App\Http\Controllers\Admin\PermissionController::class, 'edit'])->name('admin.permission.edit');
    Route::get('permission/destroy/{id}', [App\Http\Controllers\Admin\PermissionController::class, 'destroy'])->name('admin.permission.destroy');
    Route::get('permission/show/{id}', [App\Http\Controllers\Admin\PermissionController::class, 'show'])->name('admin.permission.show');
    Route::put('permission/update/{id}', [App\Http\Controllers\Admin\PermissionController::class, 'update'])->name('admin.permission.update');


    Route::get('role', [App\Http\Controllers\Admin\RoleController::class, 'index'])->name('admin.role.index');
    Route::get('role/create', [App\Http\Controllers\Admin\RoleController::class, 'create'])->name('admin.role.create');
    Route::post('role/store', [App\Http\Controllers\Admin\RoleController::class, 'store'])->name('admin.role.store');
    Route::get('role/edit/{id}', [App\Http\Controllers\Admin\RoleController::class, 'edit'])->name('admin.role.edit');
    Route::get('role/destroy/{id}', [App\Http\Controllers\Admin\RoleController::class, 'destroy'])->name('admin.role.destroy');
    Route::get('role/show/{id}', [App\Http\Controllers\Admin\RoleController::class, 'show'])->name('admin.role.show');
    Route::put('role/update/{id}', [App\Http\Controllers\Admin\RoleController::class, 'update'])->name('admin.role.update');

});