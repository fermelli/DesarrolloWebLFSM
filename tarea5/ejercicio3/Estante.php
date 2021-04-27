<?php
class Shelf
{
  protected $row1 = [];
  protected $row2 = [];
  protected $row3 = [];
  protected $top1;
  protected $top2;
  protected $top3;

  function __construct($top1, $top2, $top3)
  {
    $this->top1 = $top1;
    $this->top2 = $top2;
    $this->top3 = $top3;
  }

  public function getRow1Length()
  {
    return count($this->row1);
  }

  public function getRow2Length()
  {
    return count($this->row2);
  }

  public function getRow3Length()
  {
    return count($this->row3);
  }

  public function getRow1BookByIndex($index)
  {
    return $this->row1[$index];
  }

  public function getRow2BookByIndex($index)
  {
    return $this->row2[$index];
  }

  public function getRow3BookByIndex($index)
  {
    return $this->row3[$index];
  }

  public function insertBook($rowNumber, $book)
  {
    switch ($rowNumber) {
      case 1:
        return $this->insert($this->row1, $this->top1, $book);
      case 2:
        return $this->insert($this->row2, $this->top2, $book);
      case 3:
        return $this->insert($this->row3, $this->top3, $book);
      default:
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
        echo $this->show($this->row1);
        break;
      case 2:
        echo $this->show($this->row2);
        break;
      case 3:
        echo $this->show($this->row3);
        break;
      default:
        echo "No hay libros que mostrar";
    }
  }

  public function insert(&$row, $top, $book)
  {
    if (count($row) < $top) {
      array_push($row, $book);
      return true;
    }
    return false;
  }

  public function remove(&$row)
  {
    if (count($row) > 0) {
      return array_pop($row);
    }
    return false;
  }

  public function show($row)
  {
    if (count($row) > 0) {
      $list = "<ol class='list'>";
      foreach ($row as $book) {
        $list .= "<li class='list-item'>$book</li>";
      }
      $list .= "</ol>";
      return $list;
    }
    return "No hay libros que mostrar";
  }
}
