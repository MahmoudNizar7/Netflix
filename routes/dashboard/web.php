<?php

    use App\Http\Controllers\Auth\LoginController;
    use App\Http\Controllers\Dashboard\CategoryController;
    use App\Http\Controllers\Dashboard\RoleController;
    use App\Http\Controllers\Dashboard\SettingController;
    use App\Http\Controllers\Dashboard\UserController;
    use App\Http\Controllers\Dashboard\WelcomeController;
    use App\Http\Controllers\Dashboard\MovieController;
    use Illuminate\Support\Facades\Route;

    Route::prefix('dashboard')->name('dashboard.')->middleware(['auth', 'role:super_admin|admin'])->group(function () {

        Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
        Route::resource('categories', CategoryController::class)->except(['show']);
        Route::resource('roles', RoleController::class)->except(['show']);
        Route::resource('users', UserController::class)->except(['show']);
        Route::resource('movies', MovieController::class);

        Route::get('/settings/social_login', [SettingController::class, 'social_login'])->name('settings.social_login');
        Route::get('/settings/social_links', [SettingController::class, 'social_links'])->name('settings.social_links');
        Route::post('/settings', [SettingController::class, 'store'])->name('settings.store');

    });
