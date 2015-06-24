
<?php
require 'inc/custinit.php';

if (isset($_REQUEST['Submit'])) {


try {
  $LastName= $_POST['LastName'];
  $result = $customer->findcustomer($LastName);

  $count=count($result);
  if ($count>0)
  {
    $edit=true;
    displaycustomer($result, $edit);
  }
  else exit ("<br>There are no customer to view!");
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
 <label for="LastName">Customer Last Name (full or partial): <input type="text" id = "LastName" name="LastName"  autofocus required></label><br>
 <input type="submit" name = "Submit">
</form>
<?php
}

?>
</body>
</html>



























