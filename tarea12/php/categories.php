<?php

include("database-init.php");

$categories = $db->getCategories();
echo json_encode($categories);
