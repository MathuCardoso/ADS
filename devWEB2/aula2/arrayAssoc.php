<?php

$pessoa = array(
    "nome" => "Matheus",
    "idade" => 19,
    "peso" => 54.3
);

$pessoa2 = array(
    "nome" => "Julia",
    "idade" => 20,
    "peso" => 54.3
);

$pessoas = array($pessoa, $pessoa2);

foreach ($pessoas as $p) {
    echo $p["nome"] . " - " . $p["idade"] . "<br>";
}

// echo "Nome da pessoa 1: " . $pessoa["Nome"];
// foreach($pessoa as $p) {
//     echo $p . "<br>";
// }
