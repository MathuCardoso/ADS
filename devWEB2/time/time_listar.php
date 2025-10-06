<?php

include_once 'Conncection.php';

$conn = Connection::getConnection();

$sql = "SELECT * FROM times";
$stm = $conn->prepare($sql);
$stm->execute();
$result = $stm->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h1>Aula banco de dados - Times</h1>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Cidade</th>
            <th>Excluir</th>
        </tr>

        <?php
        foreach ($result as $r):
        ?>

            <tr>
                <td><?= $r['id'] ?></td>
                <td><?= $r['nome'] ?></td>
                <td><?= $r['cidade'] ?></td>
                <td>
                    <a href="excluir.php?id=<?= $r['id'] ?>">
                        Excluir
                    </a>
                </td>
            </tr>

        <?php endforeach; ?>


    </table>

</body>

</html>