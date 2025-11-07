<?php

use App\controller\EquipeController;
use App\controller\HomeController;
use App\controller\PilotoController;
use App\routing\Route;

require_once __DIR__ . "/../../autoload.php";

Route::get('/', [PilotoController::class, 'index']);
Route::post('/', [PilotoController::class, 'create']);

Route::get('/equipes', [EquipeController::class, 'index']);

