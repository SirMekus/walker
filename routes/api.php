<?php

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
Route::middleware('auth:sanctum')->prefix('dashboard')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('create-schedule', [App\Http\Controllers\ScheduleController::class, 'createSchedule'])->name('create_schedule.post');

    Route::get('schedules', [App\Http\Controllers\ScheduleController::class, 'schedules'])->name('schedules');

    Route::get('schedule-overview', [App\Http\Controllers\ScheduleController::class, 'scheduleOverview'])->name('schedule_overview');
});
