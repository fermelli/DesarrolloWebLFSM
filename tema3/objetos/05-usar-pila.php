<?php

include('./04-pila.php');

$p1 = new Pile(10);

$p1->push("a");
$p1->push("e");
$p1->push("i");
$p1->push("o");
$p1->push("u");

$p1->show();

echo "Elemento Eliminado " . $p1->pop() . "<br>";
$p1->show();
