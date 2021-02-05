<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\API\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/post', [PostController::class, 'index']);
Route::post('/post/store', [PostController::class, 'store']);
Route::get('/post/{id}',[PostController::class, 'show']);
Route::put('/post/update/{id}',[PostController::class ,'update']);
Route::delete('/post/{id}',[PostController::class ,'destroy']);

Route::get('/global', [ApiController::class, 'global']);
Route::get('/indonesia', [ApiController::class, 'indonesia']);

Route::get('/provinsi', [ApiController::class, 'provinsi']);
Route::get('/provinsi/{id}', [ApiController::class, 'pw']);

Route::get('/kota', [ApiController::class, 'kota']);
Route::get('/kota/{id}', [ApiController::class, 'kotashow']);

Route::get('/kecamatan', [ApiController::class, 'kecamatan']);
Route::get('/kecamata/{id}', [ApiController::class, 'kecamatanshow']);

Route::get('/desa', [ApiController::class, 'desa']);
Route::get('/desa/{id}', [ApiController::class, 'desashow']);

Route::get('/rw', [ApiController::class, 'rw']);
Route::get('/rw/{id}', [ApiController::class, 'rwshow']);

Route::get('/reaktif', [ApiController::class, 'reaktif']);
Route::get('/positif', [ApiController::class, 'positif']);
Route::get('/sembuh', [ApiController::class, 'sembuh']);
Route::get('/meninggal', [ApiController::class, 'meninggal']);