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

  public function storeTypeRooms($description, $numberBeds)
  {
    $query = "INSERT INTO type_rooms (description, number_beds) VALUES ('$description', $numberBeds)";
    return $this->query($query);
  }

  public function getTypeRooms()
  {
    $query = "SELECT id, description, number_beds FROM type_rooms";
    $result = $this->query($query);
    $typeRooms = $result->fetch_all(MYSQLI_ASSOC);
    $result->free();
    return $typeRooms;
  }

  public function getTypeRoomById($id)
  {
    $query = "SELECT description, number_beds FROM type_rooms WHERE id=$id";
    $result = $this->query($query);
    $typeRoom = $result->fetch_array(MYSQLI_ASSOC);
    $result->free();
    return $typeRoom;
  }

  public function editTypeRoom($id, $description, $numberBeds)
  {
    $query = "UPDATE type_rooms SET description='$description', number_beds='$numberBeds' WHERE id=$id";
    return $this->query($query);
  }

  public function deleteTypeRoomById($id)
  {
    $typeRoom = $this->getTypeRoomById($id);
    if ($typeRoom == NULL) {
      return false;
    }
    $query = "DELETE FROM type_rooms WHERE id=$id";
    return $this->query($query);
  }

  public function getRooms()
  {
    $query = "SELECT r.id, r.number, r.has_private_bathroom, r.space, r.price, t.description, t.number_beds FROM rooms AS r LEFT JOIN type_rooms AS t ON r.type_room_id = t.id";
    $result = $this->query($query);
    $rooms = $result->fetch_all(MYSQLI_ASSOC);
    $result->free();
    return $rooms;
  }

  public function storeRoom($number, $hasPrivateBathroom, $space, $price, $typeRoomId)
  {
    $hasPrivateBathroom = $hasPrivateBathroom ? 1 : 0;
    $query = "INSERT INTO rooms (number, has_private_bathroom, space, price, type_room_id) VALUES ($number, $hasPrivateBathroom, $space, $price, $typeRoomId)";
    return $this->query($query);
  }

  public function getRoomById($id)
  {
    $query = "SELECT number, has_private_bathroom, space, price, type_room_id FROM rooms WHERE id=$id";
    $result = $this->query($query);
    $room = $result->fetch_array(MYSQLI_ASSOC);
    $result->free();
    return $room;
  }

  public function editRoom($id, $number, $hasPrivateBathroom, $space, $price, $typeRoomId)
  {
    $hasPrivateBathroom = $hasPrivateBathroom ? 1 : 0;
    $query = "UPDATE rooms SET number=$number, has_private_bathroom=$hasPrivateBathroom, space=$space, price=$price, type_room_id=$typeRoomId WHERE id=$id";
    return $this->query($query);
  }

  public function deleteRoomById($id)
  {
    $room = $this->getRoomById($id);
    if ($room == NULL) {
      return false;
    }
    $query = "DELETE FROM rooms WHERE id=$id";
    return $this->query($query);
  }
}
