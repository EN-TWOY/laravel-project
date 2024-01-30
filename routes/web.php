<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get("/", [UserController::class, "index"])->name("user.index");
Route::post("/registrar-usuario", [UserController::class, "create"])->name("user.create");
Route::post("/actualizar-usuario", [UserController::class, "update"])->name("user.update");
Route::get("/eliminar-usuario-{id}", [UserController::class, "delete"])->name("user.delete");
Route::get("/contact", [ContactController::class, "index"])->name("contact.index");
Route::post("/enviar-mensaje", [ContactController::class, "send"])->name("contact.send");


