
<?php
require 'inc/secure.inc.php';
require 'inc/ordinit.php';
$edit=$_GET['edit'];
$result =$ord->allord();
$count=count($result);
if ($count>0)
 {
  displayord($result, $edit);
  }
  else exit ("<br>There are no records to view!");


?>
</body>
</html>



























