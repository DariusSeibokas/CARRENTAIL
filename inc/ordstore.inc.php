<?php

function displayord($result, $edit) {


 echo '<div class="table-responsive">';
 echo '<table class="table table-striped table-hover table-bordered table-condensed"><thead><tr><th>Order ID</th><th>Customer ID</th>
 <th>Customer Name</th><th>RegNo</th><th>Car</th><th>Pickup Date</th><th>Return Date</th><th>Price</th></tr></thead>';
 
 // that's it!;
 
  foreach ($result as $row) {
  
  $timestamp_start = strtotime($row['PickupDate']);

$timestamp_end = strtotime($row['RetDate']);

$difference = abs($timestamp_end - $timestamp_start);  //   1 day is 86400

 
  
     echo "<tr><td>".$row['OrderId']."</td>";
	 $ordOrderId=$row['OrderId'];
	 
	 echo "<td>".$row['CustomerID']."</td>";
	 echo "<td>".$row['FirstName']. " " .$row['LastName']."</td>";
     echo "<td>".$row['RegNo']."</td>";
	 echo "<td>".$row['Make']. " " .$row['Model']."</td>";
     echo "<td>".$row['PickupDate']."</td>";
     echo "<td>".$row['RetDate']."</td>";
	 echo "<td>".$row['Price']*($difference/86400)."</td>";
    
     
	 if ($edit) {
		echo '<td class="nocol">' . "<a href='editord.php?OrderId=$ordOrderId' class='btn btn-primary'>Update</a>" . '</td>';
	
		echo '<td class="nocol">' . "<a href='deleteord.php?OrderId=$ordOrderId' class='btn btn-primary'>Delete</a>". '</td>';
		
	  }

     echo"</tr>";
   }
  echo '</table>';
}



?>