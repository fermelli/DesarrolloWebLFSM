<?php
class Database extends mysqli
{
  public function __construct($host, $user, $password, $database)
  {
    parent::__construct($host, $user, $password, $database);

    if (mysqli_connect_error()) {
      die('Connection error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
    }
  }

  public function getCareers()
  {
    $query = "SELECT id, name FROM careers";
    $result = $this->query($query);
    $typeRooms = $result->fetch_all(MYSQLI_ASSOC);
    $result->free();
    return $typeRooms;
  }

  public function storeStudent($names, $surnames, $collegeId, $genre, $careerId)
  {
    $query = "INSERT INTO students (names, surnames, college_id, genre, career_id) VALUES ('$names', '$surnames', '$collegeId', '$genre', $careerId)";
    return $this->query($query);
  }

  public function getStudents()
  {
    $query = "SELECT s.id, s.names, s.surnames, s.college_id, s.genre, c.name AS career FROM students AS s LEFT JOIN careers AS c ON s.career_id = c.id";
    $result = $this->query($query);
    $typeRooms = $result->fetch_all(MYSQLI_ASSOC);
    $result->free();
    return $typeRooms;
  }
}
