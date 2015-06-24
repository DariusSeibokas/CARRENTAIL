
<?php

require 'inc/ordbyFinit.php';
if (isset($_REQUEST['Submit'])) {


try {
  $FirstName= $_POST['FirstName'];
  $result = $ord->findcustomer($FirstName);

  $count=count($result);
  if ($count>0)
  {
    $edit=true;
    displaycustomer($result, $edit);
  }
  else exit ("<br>There are no customers to view!");
}

catch(PDOException $e) {
 echo '<br>Problem with the Selecting from the customer table - ';
 echo $e->getMessage();
 exit;
}
}
else {
?>
<form action="" method="post" id = "form">
 <label for="FirstName">Search By Customer First Name(full or partial): <input type="text" id = "FirstName" name="FirstName"  autofocus required></label><br>
 <input type="submit" name = "Submit">
</form>
<?php
}

?>
</body>
</html>



























