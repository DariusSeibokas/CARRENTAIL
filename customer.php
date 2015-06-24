
<?php
require 'inc/secure.inc.php';
require 'inc/custinit.php';
$edit=$_GET['edit'];
$result =$customer->allcustomer();
$count=count($result);
if ($count>0)
 {
  displaycustomer($result, $edit);
  }
  else exit ("<br>There are no cuctomers to view!");


?>
</body>
</html>



























