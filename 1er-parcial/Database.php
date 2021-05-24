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

  public function getUser($email, $password)
  {
    $password = sha1($password);
    $query = "SELECT id, nombres, apellidos, correo, nivel, estado FROM usuarios WHERE correo = '$email' AND password = '$password'";
    $result = $this->query($query);
    if ($result) {
      $user = $result->fetch_array(MYSQLI_ASSOC);
      $result->free();
      return $user;
    }
    return NULL;
  }

  public function getUsers()
  {
    $query = "SELECT id, nombres, apellidos, correo, nivel, estado FROM usuarios";
    $result = $this->query($query);
    $users = $result->fetch_all(MYSQLI_ASSOC);
    $result->free();
    return $users;
  }

  public function editUser($id, $names, $surnames, $email)
  {
    $query = "UPDATE usuarios SET nombres='$names', apellidos='$surnames', correo='$email' WHERE id=$id";
    return $this->query($query);
  }
}
