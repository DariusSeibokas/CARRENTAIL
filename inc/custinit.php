<?php
require_once 'custheader.inc.php';
require_once 'database.inc.php';
require_once 'customerstore.inc.php';
require_once 'customer.inc.php';


$db  = new Database;

$customer = new customer($db);

?>