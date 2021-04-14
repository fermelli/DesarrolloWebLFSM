<?php

class Person
{
  protected $names;
  protected $surnames;

  function __construct($names, $surnames)
  {
    $this->names = $names;
    $this->surnames = $surnames;
  }

  function getFullName()
  {
    return "$this->names $this->surnames";
  }

  function printData()
  {
    echo "Nombre completo: " . $this->getFullName() . "<br>";
  }
}

class Teacher extends Person
{
  protected $profession;
  protected $identityCard;
  protected $schedule = [];

  function __construct($names, $surnames, $profession, $identityCard)
  {
    parent::__construct($names, $surnames);
    $this->profession = $profession;
    $this->identityCard = $identityCard;
  }

  function getNumberOfSubjects()
  {
    return count($this->subjects);
  }

  function printData()
  {
    parent::printData();
    echo "Profesión: " . $this->profession . "<br>";
    echo "Cédula de Identidad: " . $this->identityCard . "<br>";
  }
}

class Student extends Person
{
  protected $cu;
  protected $career;
  protected $schedule;

  function __construct($names, $surnames, $cu, $career)
  {
    parent::__construct($names, $surnames);
    $this->cu = $cu;
    $this->career = $career;
  }
}

class Subject
{
  protected $name;

  function __construct($name)
  {
    $this->name = $name;
  }
}
