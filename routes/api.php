<?php

use App\Modules\Invoices\Infrastructure\Controllers\InvoicesController;
use App\Modules\InvoicesApproval\Infrastructure\Controllers\InvoicesApprovalController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/invoices/{id}', [InvoicesController::class, 'show']);
Route::post('/invoices/{id}/approve', [InvoicesApprovalController::class, 'approve']);
Route::post('/invoices/{id}/reject', [InvoicesApprovalController::class, 'reject']);
