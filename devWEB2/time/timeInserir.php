<?php

include_once 'Conncection.php';

if (!isset($_GET['nome']) || !isset($_GET['cidade'])) {
    echo "Informe os parâmetros nome e cidade.";
    exit;
}
$nome = $_GET['nome'];
$cidade = $_GET['cidade'];

$conn = Connection::getConnection();

$sql = "INSERT INTO times (nome, cidade)
VALUES(?, ?)";
$stm = $conn->prepare($sql);

$stm->execute([$nome, $cidade]);

header('location: time_listar.php');
