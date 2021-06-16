<?php

include("database-init.php");

$produts = $db->getProducts();
echo json_encode($produts);
