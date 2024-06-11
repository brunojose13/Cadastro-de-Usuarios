<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('', []);
 


Route::controller(CustomerController::class)->group(function () {
    Route::prefix('cliente')->group(function () {
        Route::post('/salvar', 'store');
        Route::patch('/atualizar-dados', 'update');
        Route::get('/listar/{id?}', 'index');
        Route::delete('/excluir/{id}', 'delete');
    });
});
