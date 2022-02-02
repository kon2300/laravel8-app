<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ArticleShow;
use App\Http\Livewire\ArticleDetail;
use App\Http\Livewire\ArticleCreate;
use App\Http\Livewire\ArticleEdit;
use App\Http\Livewire\UserShow;

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

Auth::routes();

Route::redirect('/', '/article/show');

Route::get('/article/show', ArticleShow::class)->name('article.show');

Route::group(['middleware' => ['auth']], function () {

    Route::get('/article/detail/{id}', ArticleDetail::class)->name('article.detail');

    Route::get("/article/create", ArticleCreate::class)->name("article.create");

    Route::get("/article/edit/{id}", ArticleEdit::class)->name("article.edit");

    Route::get("/user/show/{id}", UserShow::class)->name("user.show");

});
