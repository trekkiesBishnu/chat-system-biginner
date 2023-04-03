<?php

use App\Events\SendMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;
use BeyondCode\LaravelWebSockets\Apps\AppProvider;
use BeyondCode\LaravelWebSockets\Dashboard\DashboardLogger;

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
Route::post("/sockets/connect", [SocketsController::class, "connect"]);

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/chatify', [App\Http\Controllers\HomeController::class, 'chatify'])->name('test');

// for web socket chat
Route::get('/', [ChatController::class, 'index'])->name('index');
Route::post('/', [ChatController::class, 'broadcastMessage'])->name('broadcastMessage');



 
        


