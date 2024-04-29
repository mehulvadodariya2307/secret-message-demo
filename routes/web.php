<?php

use App\Http\Controllers\DecryptedMessageController;
use App\Http\Controllers\EncryptedMessageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('composeMessage');
})->name('home');

Route::post('compose-message', [EncryptedMessageController::class, 'composeMessage'])->name('compose-message');
Route::any('read-message/{id}', [DecryptedMessageController::class, 'readMessage'])->name('read-message');
