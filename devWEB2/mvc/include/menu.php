<?php
require_once __DIR__ . "/../util/config.php";
?>

<nav class="navbar navbar-expand-md bg-success px-3">
    <a class="navbar-brand" href="<?= APP_URL ?>">MVC Alunos</a>
    <button class="navbar-toggler" type="button"
        data-bs-toggle="collapse" data-bs-target="#navSite">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navSite">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#"
                    id="navDropDown" data-bs-toggle="dropdown">Cadastros</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Alunos</a>
                    <a class="dropdown-item" href="#">Turmas</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Sobre</a>
            </li>
        </ul>
    </div>
</nav>