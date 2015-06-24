
<?php
require 'inc/secure.inc.php';
require 'inc/init.php';
$edit=$_GET['edit'];
$result =$car->allcar();
$count=count($result);
if ($count>0)
 {
  displaycar($result, $edit);
  }
  else exit ("<br>There are no cars to view!");


?>
</body>
</html>



























