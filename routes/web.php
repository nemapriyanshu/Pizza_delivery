<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\firstcontroller;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/register',[firstcontroller::class,'register']);
Route::post('/registerdone',[firstcontroller::class,'registerdone']);

Route::get('/login',[firstcontroller::class,'login']);
Route::post('/logindone',[firstcontroller::class,'logindone']);


Route::get('/',[firstcontroller::class,'index']);
Route::get('logout',[firstcontroller::class,'logout']);

Route::get('menu',[firstcontroller::class,'menu']);


Route::get('menu/{id?}',[firstcontroller::class,'menuadd']);




Route::get('card',[firstcontroller::class,'card']);

Route::get('checkout/{id}',[firstcontroller::class,'checkout']);

Route::get('checkdone',[firstcontroller::class,'checkdone']);

Route::get('card/{id?}',[firstcontroller::class,'deletecard']);



Route::get('test',[firstcontroller::class,'try']);