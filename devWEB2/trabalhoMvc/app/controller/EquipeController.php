<?php
namespace App\controller;
use App\controller\Controller;

class EquipeController extends Controller{

    public function index() {
        $this->loadView('equipe/equipes');
    }
}