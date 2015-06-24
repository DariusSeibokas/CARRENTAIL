
<?php
require 'inc/init.php';

if (isset($_REQUEST['Submit'])) {


try {
  $Make= $_POST['Make'];
  $result = $car->findcar($Make);

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
 <label for="Make">Car Make(full or partial): <input type="text" id = "Make" name="Make"  autofocus required></label><br>
 <input type="submit" name = "Submit">
</form>
<?php
}

?>
</body>
</html>



























