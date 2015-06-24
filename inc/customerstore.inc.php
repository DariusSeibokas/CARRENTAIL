<?php

function displaycustomer($result, $edit) {
 echo '<div class="table-responsive">';
 echo '<table class="table table-striped table-hover table-bordered table-condensed"><thead><tr><th>CustomerID</th><th>FirstName</th><th>LastName</th>
 <th>DOB</th><th>Street</th><th>County</th><th>Town</th><th>Phone</th><th>Email</th></tr></thead>';
  foreach ($result as $row) {
	 echo "<tr><td>".$row['CustomerID']."</td>";
	 $customerCustomerID=$row['CustomerID'];
	 echo "<td>".$row['FirstName']."</td>";
     echo "<td>".$row['LastName']."</td>";
     echo "<td>".$row['DOB']."</td>";
     echo "<td>".$row['Street']."</td>";
	 echo "<td>".$row['County']."</td>";
	 echo "<td>".$row['Town']."</td>";
	 echo "<td>".$row['Phone']."</td>";
	 echo "<td>".$row['Email']."</td>";
	 
     
	 if ($edit) {
		echo '<td class="nocol">' . "<a href='editcustomer.php?CustomerID=$customerCustomerID' class='btn btn-primary'>Update</a>" . '</td>';
	
		echo '<td class="nocol">' . "<a href='deletecustomer.php?CustomerID=$customerCustomerID' class='btn btn-primary'>Delete</a>". '</td>';
		}
	  }

     echo"</tr>";
   }
  echo '</table>';




?>