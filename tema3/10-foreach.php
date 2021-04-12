<?php

$student1 = [
  'name' => 'Juan',
  'lastname' => 'Perez',
  'edad' => 22
];

$student2 = [
  'name' => 'Pedro',
  'lastname' => 'Pascal',
  'edad' => 21
];

$students = [];
$students[] = $student1;
$students[] = $student2;

foreach ($students as $index => $student) {
  echo "Alumno $index + 1</br>";
  foreach ($student as $key => $property) {
    echo "$key: $property </br>";
  }
}
