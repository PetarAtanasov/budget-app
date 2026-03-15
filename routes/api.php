<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/transactions', [TransactionController::class, 'index']);
    Route::post('/transactions', [TransactionController::class, 'store']);
    Route::put('/transactions/{transaction}', [TransactionController::class, 'update']);
    Route::delete('/transactions/{transaction}', [TransactionController::class, 'destroy']);

    Route::get('/summary/monthly', [TransactionController::class, 'monthlySummary']);
});

