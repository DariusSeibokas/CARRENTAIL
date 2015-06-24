<?php

function displaycar($result, $edit) {
 echo '<div class="table-responsive">';
 echo '<table class="table table-striped table-hover table-bordered table-condensed"><thead><tr><th>RegNo</th><th>Make</th><th>Model</th>
 <th>FuelType</th><th>Numberseats</th><th>Status</th><th>Price</th></tr></thead>';
  foreach ($result as $row) {
	 echo "<tr><td>".$row['RegNo']."</td>";
	 $CarRegNo=$row['RegNo'];
	 echo "<td>".$row['Make']."</td>";
	 echo "<td>".$row['Model']."</td>";
     echo "<td>".$row['FuelType']."</td>";
	 echo "<td>".$row['NumberSeats']."</td>";
	 echo "<td>".$row['Status']."</td>";
     echo "<td>".$row['Price']."</td>";
     
        
	 if ($edit) {
		echo '<td class="nocol">' . "<a href='editcar.php?RegNo=$CarRegNo' class='btn btn-primary'>Update</a>" . '</td>';
	
		echo '<td class="nocol">' . "<a href='deletecar.php?RegNo=$CarRegNo' class='btn btn-primary'>Delete</a>". '</td>';
		
	  }

     echo"</tr>";
   }
  echo '</table>';
}

?>