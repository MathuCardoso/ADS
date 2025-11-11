<?php

use App\controller\CategoriaController;
use App\controller\EquipeController;
use App\controller\HomeController;
use App\controller\LoginController;
use App\controller\PilotoController;
use App\routing\Route;

require_once __DIR__ . "/../../autoload.php";

Route::get('/pilotos', [PilotoController::class, 'index']);
Route::post('/pilotos', [PilotoController::class, 'create']);

Route::get('/equipes', [EquipeController::class, 'index']);
Route::post('/equipes', [EquipeController::class, 'create']);

Route::get('/categorias', [CategoriaController::class, 'index']);
Route::post('/categorias', [CategoriaController::class, 'create']);

Route::get('/login', [LoginController::class, 'index']);
