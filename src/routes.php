<?php

use Stability\EasyTools\JobDetailController;
// Route::get('packagetest', function () {
//     return "this is visible from easytoolservice package";
// });
// Route::get('/', function () {
//     return view('stability::job-detail');
// });
Route::get('/remover-tool', [JobDetailController::class, 'index'])->name('job-detail.index');
Route::delete('/remover-tool/{jId}', [JobDetailController::class, 'destroy'])->name('job-detail.destroy');
Route::delete('/remover-toolDeleteSelected', [JobDetailController::class, 'deleteSelected']);
