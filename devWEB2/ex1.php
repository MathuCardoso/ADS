<?php

print("<h1>WHILE</h1>");
$i = 1;

while ($i <= 10) {
    print($i . "<br>");
    $i++;
}


print("<h1>DO WHILE</h1>");


$i = 1;

do {
    print($i . "<br>");
    $i++;
} while ($i <= 10);


print("<h1>FOR</h1>");


for ($i = 1; $i <= 10; $i++) {
    print($i . "<br>");
}
