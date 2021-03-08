<?php


use Illuminate\Support\Facades\Route;

Route::prefix('api')->middleware('api')->group(function () {
    Route::get('version', [Aoeng\Laravel\Admin\Version\Http\Controllers\VersionController::class, 'index']);
});
