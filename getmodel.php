<?php
 $makemodel=$_REQUEST["choice"];
 require_once 'inc/database.inc.php';
 $sql="SELECT model FROM makemodel WHERE make = :model";
 $stmt = $db->prepare($sql);
 $stmt->bindValue(':model', $makemodel, PDO::PARAM_STR);
  $stmt->execute();
 $count= $stmt->rowCount();
 if ($count==0) {
  exit("There are no model to view!");
 }
 $result= $stmt->fetchAll(PDO::FETCH_ASSOC);
 foreach($result as $row) {
     $model = $row['model'];
     echo "<option value = '$model'>" . $model. "</option>";
 }
?>