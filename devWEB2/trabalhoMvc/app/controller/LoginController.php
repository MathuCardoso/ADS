<?php

namespace App\controller;

class LoginController extends Controller
{

    public function index()
    {
        $this->loadView('login/login', ['erros' => $erros = []]);
    }
}
