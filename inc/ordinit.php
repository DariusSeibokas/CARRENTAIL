<?php
require_once 'ordheader.inc.php';
require_once 'database.inc.php';
require_once 'ordstore.inc.php';
require_once 'ord.inc.php';



$db  = new Database;

$ord 		= new ord($db);

?>