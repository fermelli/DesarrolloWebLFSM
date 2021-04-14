<?php
class Pile
{
  private $elements = [];
  private $top;
  private $max;

  function __construct($max)
  {
    $this->max = $max;
    $this->top = 0;
  }

  function push($element)
  {
    if ($this->top == $this->max) {
      echo "La pila esta llena";
    } else {
      $this->elements[$this->top] = $element;
      $this->top++;
    }
  }

  function pop()
  {
    if ($this->top == 0) {
      echo "La pila esta vácia";
    } else {
      $this->top--;
      return $this->elements[$this->top];
    }
  }

  function show()
  {
    if ($this->top == 0) {
      echo "La pila esta vácia";
    } else {
      echo "Los elementos de la Pila son:<br>";
      for ($i = 0; $i < $this->top; $i++) {
        echo $this->elements[$i] . "<br>";
      }
    }
  }
}
