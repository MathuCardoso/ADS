<?php
include_once 'Pessoa.php';
include_once 'Livro.php';

$p = new Pessoa();
$p->setNome("Matheus");
$p->setSobrenome("Cardoso");

$p2 = new Pessoa();
$p2->setNome("Felipe");
$p2->setSobrenome("Massa");

$p3 = new Pessoa();
$p3->setNome("Ayrton");
$p3->setSobrenome("Senna");
//////////////////////////////////////

$l1 = new Livro();
$l1->setTitulo("Matheus e cia");
$l1->setAutor("Matheus");
$l1->setGenero("Drama");
$l1->setQtdPaginas(350);

$l2 = new Livro();
$l2->setTitulo("Harry Potter");
$l2->setAutor("Eu");
$l2->setGenero("Aventura");
$l2->setQtdPaginas(199);

$l3 = new Livro();
$l3->setTitulo("It");
$l3->setAutor("Juscelino Kubitschek");
$l3->setGenero("Diversão");
$l3->setQtdPaginas(83);


$livros = [
    $l1,
    $l2,
    $l3
];


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        table {
            border: 2px solid white;
            border-collapse: collapse;
            font-size: 2rem;
        }

        td,
        th {
            border: 2px solid white;
        }

        th {
            background-color: blue;
            color: white;
            padding: 10px;
        }

        td {
            padding: 10px;
            background-color: rgba(0, 0, 0, 0.8);
            color: white;
        }
    </style>

</head>

<body>

    <?php
    echo "<h1>" . $p->getNomecompleto() . "</h1>";
    echo "<h1>" . $p2->getNomecompleto() . "</h1>";
    echo "<h1>" . $p3->getNomecompleto() . "</h1>";
    ?>


    <table>

        <th>Título</th>
        <th>Gênero</th>
        <th>Autor</th>
        <th>Páginas</th>

        <?php
        foreach ($livros as $l) {
            echo "<tr>";
            echo "<td>";
            echo $l->getTitulo();
            echo "</td>";

            echo "<td>";
            echo $l->getGenero();
            echo "</td>";

            echo "<td>";
            echo $l->getAutor();
            echo "</td>";

            echo "<td>";
            echo $l->getQtdPaginas();
            echo "</td>";
            echo "</tr>";
        }
        ?>

    </table>


</body>

</html>