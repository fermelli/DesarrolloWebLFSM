<?php

include("database-init.php");

$brands = $db->getBrands();
echo json_encode($brands);
