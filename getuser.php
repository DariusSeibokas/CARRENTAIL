<?php
 require_once 'inc/database.inc.php';
 $email=$_REQUEST["email"];
/* This piece of code can be used if updating the customer record (and if you use AJAX to call this file) and checking if the
   email is already there but belongs to the customer already.
 if (isset($_REQUEST["customer"])) {
  $cust=$_REQUEST["customer"];
  $sql= "SELECT * FROM customer WHERE CustomerID = :cust";
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':cust', $cust, PDO::PARAM_STR);
  $stmt->execute();
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  $curemail=$row['email'];
  if ($email==$curemail) {
      echo('True');
  }
 }
 */
 $sql="SELECT * FROM customer WHERE email = :email";
 $stmt = $db->prepare($sql);
 $stmt->bindValue(':email', $email, PDO::PARAM_STR);
 $stmt->execute();
 $count= $stmt->rowCount();
 if ($count>0) {
   echo('False');
 }  else {
   echo('True');
 }
?>