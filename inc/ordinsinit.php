<?php
require_once 'ordheader.inc.php';
require_once 'database.inc.php';
require_once 'ordstore.inc.php';
require_once 'ord.inc.php';
require_once 'customer.inc.php';
require_once 'car.inc.php';

$db  = new Database;

$ord 		= new ord($db);
$customer = new customer($db);
$car = new car($db);

?>