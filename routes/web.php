<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('/app')->group(function() {

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('app.home');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('app.home');
    
    //Profiles
    Route::resource('profile', 'App\Http\Controllers\ProfileController');
    Route::get('profile/select/{profile_id}', [App\Http\Controllers\ProfileController::class, 'select'])->name('profile.select');
    
    //Phase
    Route::resource('phase', 'App\Http\Controllers\PhaseController');
    Route::post('managetopicphase/', [App\Http\Controllers\PhaseController::class, 'manageTopicPhase']);
    
    //Topic
    Route::resource('topic', 'App\Http\Controllers\TopicController');
   
    //Note
    Route::resource('note', 'App\Http\Controllers\NoteController');
    Route::get('create/{topic_id}', [App\Http\Controllers\NoteController::class, 'create'])->name('note.create.topic');
    Route::get('printpdf/{note}', [App\Http\Controllers\NoteController::class, 'printPDF'])->name('note.print.pdf');
    
});
