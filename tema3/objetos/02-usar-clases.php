<?php

include("./01-clases.php");

echo "<h1>Profesor</h1>";

$names = $_POST['names'];
$surnames = $_POST['surnames'];
$profession = $_POST['profession'];
$identityCard = $_POST['identity-card'];

$teacher = new Teacher($names, $surnames, $profession, $identityCard);

$teacher->printData();
