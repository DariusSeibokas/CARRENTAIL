<?php
require_once 'header.inc.php';
require_once 'database.inc.php';
require_once 'carstore.inc.php';
require_once 'car.inc.php';




$db  = new Database;

$car = new car($db);

?>