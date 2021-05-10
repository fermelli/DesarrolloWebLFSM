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

  public function getRoomsWithoutReservationByType($admissionDate, $departureDate, $typeRoomId)
  {
    $query = "SELECT ro.id, ro.number, ro.has_private_bathroom, ro.space, ro.price, t.description, t.number_beds FROM rooms AS ro LEFT JOIN type_rooms AS t ON ro.type_room_id = t.id WHERE ro.id NOT IN (SELECT h.id from reservations AS r LEFT JOIN rooms AS h ON r.room_id = h.id WHERE (r.admission_date BETWEEN '$admissionDate' AND '$departureDate' OR r.departure_date BETWEEN '$admissionDate' AND '$departureDate') AND h.type_room_id = $typeRoomId) AND ro.type_room_id = $typeRoomId";
    $result = $this->query($query);
    $rooms = $result->fetch_all(MYSQLI_ASSOC);
    $result->free();
    return $rooms;
  }

  public function getRoomAllInfoById($id)
  {
    $query = "SELECT r.number, r.has_private_bathroom, r.space, r.price, t.description, t.number_beds FROM rooms AS r LEFT JOIN type_rooms AS t ON r.type_room_id = t.id WHERE r.id=$id";
    $result = $this->query($query);
    $room = $result->fetch_array(MYSQLI_ASSOC);
    $result->free();
    return $room;
  }

  public function storeReservations($admissionDate, $departureDate, $isPad, $names, $surnames, $email, $roomId)
  {
    $query1 = "SELECT * from reservations WHERE (admission_date BETWEEN '$admissionDate' AND '$departureDate' OR departure_date BETWEEN '$admissionDate' AND '$departureDate') AND room_id =  $roomId";
    $result = $this->query($query1);
    $count = $result->num_rows;
    $result->free();

    if ($count > 0) {
      return FALSE;
    } else {
      $code = uniqid();
      $isPad = $isPad ? 1 : 0;
      $query2 = "INSERT INTO reservations (code, admission_date, departure_date, is_pad, names, surnames, email, room_id) VALUES ('$code', '$admissionDate', '$departureDate', $isPad, '$names', '$surnames', '$email', $roomId)";
      return $this->query($query2);
    }
  }

  public function getReservations()
  {
    $query = "SELECT r.id, r.code, r.admission_date, r.departure_date, r.is_pad, r.names, r.surnames, r.email, ro.id, ro.number, ro.has_private_bathroom, ro.space, ro.price, t.description, t.number_beds FROM reservations AS r LEFT JOIN rooms AS ro ON r.room_id = ro.id LEFT JOIN type_rooms AS t ON ro.type_room_id = t.id ORDER BY r.admission_date";
    $result = $this->query($query);
    $reservations = $result->fetch_all(MYSQLI_ASSOC);
    $result->free();
    return $reservations;
  }

  public function storeImage($name, $roomId)
  {
    $query = "INSERT INTO room_photos (name, room_id) VALUES ('$name', $roomId)";
    return $this->query($query);
  }

  public function getImagesByRoomId($roomId)
  {
    $query = "SELECT id, name FROM room_photos WHERE room_id=$roomId";
    $result = $this->query($query);
    $images = $result->fetch_all(MYSQLI_ASSOC);
    $result->free();
    return $images;
  }

  public function getImageById($id)
  {
    $query = "SELECT id, name FROM room_photos WHERE id=$id";
    $result = $this->query($query);
    $image = $result->fetch_array(MYSQLI_ASSOC);
    $result->free();
    return $image;
  }

  public function deleteImageById($id)
  {
    $image = $this->getImageById($id);
    if ($image == NULL) {
      return false;
    }
    $query = "DELETE FROM room_photos WHERE id=$id";
    return $this->query($query);
  }
}
