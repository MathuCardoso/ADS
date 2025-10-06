<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercícios</title>
</head>

<body>

    <?php
    $equipesF1 = array("Mercedes", "Ferrari", "McLaren", "Red Bull", "Sauber");
    $equipesF2 = array("Prema", "Trident", "ArtGp", "AIX", "Dams");
    $equipesIndy = array("Andretti", "Penske", "Ganassi", "Arrow McLaren", "A.J. Foyt Racing");
    $clubesBrasil = array("Flamengo", "Grêmio", "Palmeiras", "Mirassol", "Paysandu");

    ?>

    <ol type="I">
        <li>
            <?php
            foreach ($equipesF1 as $f1) {
                echo $f1 . " ";
            }
            ?>
        </li>

        <br>

        <li>
            <?php
            foreach ($equipesF2 as $f2) {
                echo $f2 . " ";
            }
            ?>
        </li>

        <br>

        <li>
            <?php
            foreach ($equipesIndy as $indy) {
                echo $indy . " ";
            }
            ?>
        </li>

        <br>

        <li>
            <?php
            foreach ($clubesBrasil as $clubes) {
                echo $clubes . " ";
            }
            ?>
        </li>
    </ol>

</body>

</html>