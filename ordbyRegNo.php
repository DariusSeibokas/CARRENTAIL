
<?php
require 'inc/ordbyRinit.php';

if (isset($_REQUEST['Submit'])) {


try {
  $RegNo= $_POST['RegNo'];
  $result = $ord->findcar($RegNo);

  $count=count($result);
  if ($count>0)
  {
    $edit=true;
    displaycar($result, $edit);
  }
  else exit ("<br>There are no cars to view!");
}

catch(PDOException $e) {
 echo '<br>Problem with the Selecting from the car table - ';
 echo $e->getMessage();
 exit;
}
}
else {
?>
<form action="" method="post" id = "form">
 <label for="RegNo">Search By Car RegNo(full or partial): <input type="text" id = "RegNo" name="RegNo"  autofocus required></label><br>
 <input type="submit" name = "Submit">
</form>
<?php
}

?>
</body>
</html>



























