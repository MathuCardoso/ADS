<?php

include_once 'Conncection.php';
if (!isset($_GET['id'])) {
    echo "Id não informado.";
    exit;
}
$conn = Connection::getConnection();
$id = $_GET['id'];
$conn = Connection::getConnection();
$sql = "DELETE FROM times WHERE id = ?";
$stm = $conn->prepare($sql);
$stm->execute([$id]);
header("location: time_listar.php");
