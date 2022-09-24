<?php

use App\Http\Controllers\ChirpController;
use Illuminate\Support\Facades\Route;
use Laravel\Jetstream\Jetstream;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group  which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('chirps', ChirpController::class)
    ->only(['index', 'store'])
    ->middleware(['auth', 'verified']);


Route::get('/policy', function () {
    // $x = abort(301);
    // $x = app_path();
    // $x = asset('assets');
    // $x = config_path();
    // $x = info('my info');
    // $x = logger('asd');
    // $x = lang_path();
    $x = secure_asset('.');
    dd($x);
    // $policyFile = Jetstream::localizedMarkdownPath('policy.md');

    $policyFile = resource_path('markdown/policy.md');
    dd($policyFile);
    return view('policy', [
        'policy' => str()->markdown(file_get_contents($policyFile)),
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
