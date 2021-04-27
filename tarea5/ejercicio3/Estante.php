<?php
class Shelf
{
  private $row1 = [];
  private $row2 = [];
  private $row3 = [];
  private $top1;
  private $top2;
  private $top3;

  function __construct($top1, $top2, $top3)
  {
    $this->tope1 = $top1;
    $this->tope2 = $top2;
    $this->tope3 = $top3;
  }

  public function getTop1()
  {
    return $this->top1;
  }

  public function getTop2()
  {
    return $this->top2;
  }

  public function getTop3()
  {
    return $this->top3;
  }

  public function insertBook($rowNumber, $book)
  {
    if ($rowNumber == 1) {
      return $this->insert($this->row1, $this->top1, $book);
    } else if ($rowNumber == 2) {
      return $this->insert($this->row2, $this->top2, $book);
    } else if ($rowNumber == 3) {
      return $this->insert($this->row3, $this->top3, $book);
    } else {
      return false;
    }
  }

  public function removeBook($rowNumber)
  {
    switch ($rowNumber) {
      case 1:
        return $this->remove($this->row1);
      case 2:
        return $this->remove($this->row2);
      case 3:
        return $this->remove($this->row3);
      default:
        return false;
    }
  }

  public function showRow($rowNumber)
  {
    switch ($rowNumber) {
      case 1:
        $this->show($this->row1);
      case 2:
        $this->show($this->row2);
      case 3:
        $this->show($this->row3);
      default:
        echo "No hay libros que mostrar";
    }
  }

  public function insert($row, $top, $book)
  {
    if (count($row) < $top) {
      array_push($row, $book);
      return true;
    }
    return false;
  }

  public function remove($row)
  {
    if (count($row) > 0) {
      return array_pop($row);
    }
    return false;
  }

  public function show($row)
  {
    foreach ($row as $book) {
      echo "$book <br />";
    }
  }
}
