<?php
class Operations
{
  public $a;
  public $b;
  public $c;

  function __construct($a, $b, $c)
  {
    $this->a = $a;
    $this->b = $b;
    $this->c = $c;
  }

  function calculateMultiplication()
  {
    return $this->a * $this->b * $this->c;
  }

  function calculateLower()
  {
    if ($this->a < $this->b) {
      if ($this->a < $this->c) {
        return $this->a;
      } else {
        return $this->c;
      }
    } else {
      if ($this->b < $this->c) {
        return $this->b;
      } else {
        return $this->c;
      }
    }

    return $this->b;
  }

  function showCalculations()
  {
    $table =
      "<table class='table-operations'>
      <tr>
        <th colspan='2'>Valor de A</th>
        <th colspan='2'>Valor de B</th>
        <th colspan='2'>Valor de C</th>
      </tr>
      <tr>
        <td colspan='2'>$this->a</td>
        <td colspan='2'>$this->b</td>
        <td colspan='2'>$this->c</td>
      </tr>
      <tr>
        <td colspan='3' class='orange'>Multiplicación</td>
        <td colspan='3'>{$this->calculateMultiplication()}</td>
      </tr>
      <tr>
        <td colspan='3' class='orange'>Menor</td>
        <td colspan='3'>{$this->calculateLower()}</td>
      </tr>
    </table>";

    return $table;
  }
}
