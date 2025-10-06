<?php

echo "Parâmetros recebidos: <br>";
$nome = $_GET['nome'];
$idade = $_GET['idade'];
echo $nome . "<br>" . $idade;
//get.php?nome=Daniel&idade=27