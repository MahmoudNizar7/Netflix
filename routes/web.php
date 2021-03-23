<?php

    use App\Http\Controllers\Auth\LoginController;
    use App\Http\Controllers\MovieController;
    use App\Http\Controllers\WelcomeController;
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

    Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

    Auth::routes();

    // login by facebook and google
    Route::get('/login/{provider}', [LoginController::class, 'redirectToProvider'])->where('provider', 'facebook|google');
    Route::get('/login/{provider}/callback', [LoginController::class, 'handleProviderCallback'])->where('provider', 'facebook|google');

    Route::resource('movies', MovieController::class)->only(['index', 'show']);

    Route::post('/movies/{movie}/increment_views', [MovieController::class, 'increment_views'])->name('movies.increment_views');
    Route::post('/movies/{movie}/toggle_favorite', [MovieController::class, 'toggle_favorite'])->name('movies.toggle_favorite');
