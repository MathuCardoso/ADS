<?php
    
$nome = isset($_POST['nome']) ? $_POST['nome'] : '';
$idade = isset($_POST['idade']) ? $_POST['idade'] : '';


echo $nome . " - " . $idade;