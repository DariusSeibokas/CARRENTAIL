<?php
 $county=$_REQUEST["choice"];
 require_once 'inc/database.inc.php';
 $sql="SELECT town FROM towns WHERE mycounty = :county";
 $stmt = $db->prepare($sql);
 $stmt->bindValue(':county', $county, PDO::PARAM_STR);
  $stmt->execute();
 $count= $stmt->rowCount();
 if ($count==0) {
  exit("There are no towns to view!");
 }
 $result= $stmt->fetchAll(PDO::FETCH_ASSOC);
 foreach($result as $row) {
     $town = $row['town'];
     echo "<option value = '$town'>" . $town. "</option>";
 }
?>