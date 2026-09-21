<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get("/post" , [PostController::class , "index"])->name("post.index");
Route::get("/post/create" , [PostController::class , "create"])->name("post.create");
Route::post("/post/store" , [PostController::class , "store"])->name("post.store");
Route::get("/post/{id}" , [PostController::class , "show"])->name("post.show");
Route::get("/post/edit/{id}" , [PostController::class , "edit"])->name("post.edit");
Route::put("/post/{id}" , [PostController::class , "update"])->name("post.update");
Route::post("/post/{id}" , [PostController::class , "destroy"])->name("post.destroy");