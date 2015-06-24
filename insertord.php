<?php
require 'inc/ordinsinit.php';

if (isset($_REQUEST['Submit'])) {
 
 $CustomerID=$_POST['CustomerID'];
 $RegNo=$_POST['RegNo'];
 $PickupDate=$_POST['PickupDate'];
 $RetDate=$_POST['RetDate'];

$ord->addord($CustomerID, $RegNo, $PickupDate, $RetDate);
try {
 $result =$ord->allord();
 $count=count($result);
 if ($count>0)
 {

  $edit=false;
  displayord($result, $edit);
  }
  else exit ("<br>There are no orders to view!");
 }
 catch (PDOException $e)
 {
  echo '<br>PDO Exception Caught.';
  echo 'Error with the database: <br>';
  echo 'SQL Query: ', $sql;
  echo 'Error: ' . $e->getMessage().'</p>';
 }
}
else{
   $result = $customer->allcustomer();
   $result2 =$car->allcar()
?>
	<form action="" class="form-horizontal" method="POST">
   <fieldset>
    <legend>Please Complete the Details</legend>
	
	
     <div class ="form-group">
       <label for="CustomerID" class="col-sm-2 control-label">Customer Name</label>
       <div class="col-sm-10">
        <select name="CustomerID" id = "CustomerID" class="form-control" required>
        <option selected value = "">Select One</option>
		             <?php
		             foreach ($result as $row)
		             {
		             $CustomerID=$row['CustomerID'];
		             $FName=$row['FirstName'];
					 $LName=$row['LastName'];
		             echo "<option value='$CustomerID'>$FName $LName</option>\n";
		             }
            ?>
         </select>
       </div>
       </div>
	 
	 
	 <div class ="form-group">
       <label for="RegNo" class="col-sm-2 control-label">Reg Number</label>
       <div class="col-sm-10">
        <select name="RegNo" id = "RegNo" class="form-control" required>
        <option selected value = "">Select One</option>
		             <?php
		             foreach ($result2 as $row)
		             {
		             $RegNo=$row['RegNo'];
		             $Make=$row['Make'];
					  $Model=$row['Model'];
		             echo "<option value='$RegNo'>$RegNo $Make $Model</option>\n";
		             }
            ?>
         </select>
       </div>
       </div>
	 	 
     <div class ="form-group">
	   	 <label for="PickupDate" class=" col-sm-2 control-label">Pickup Date</label>
	   	 <div class="col-sm-10">
	   		  <div class="input-group date" id='PickupDate' name="PickupDate" data-date-format="yyyy-mm-dd" >
	   		   <input class="form-control" type="text" name="PickupDate" value="<?php echo date("Y-m-d"); ?>" required>
	   		   <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
	   	      </div>
	     </div>
	   </div>

	 <div class ="form-group">
	   	 <label for="RetDate" class=" col-sm-2 control-label">Return Date</label>
	   	 <div class="col-sm-10">
	   		  <div class="input-group date" id='RetDate' name="RetDate" data-date-format="yyyy-mm-dd" >
	   		   <input class="form-control" type="text" name="RetDate" required>
	   		   <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
	   	      </div>
	     </div>
	   </div>
	 
<div class = "form-group">
 <div class="col-sm-10 col-sm-offset-2">
       <input type="submit" class="btn btn-primary"value="Insert Booking Record" name = "Submit">
       <input type="reset" class="btn btn-primary"value="Clear the Info" >
	 </div>
	 </div>
    </fieldset>
    </form>

</section>
</div>
</div>

<?php
}
?>

<script type="text/javascript">
	$(document).ready(function() {
	    $('#PickupDate').datepicker({
	      startDate: '+0d'
	    })
	});
	</script>

	<script type="text/javascript">
	$(document).ready(function() {
	    $('#RetDate').datepicker({
	      startDate: '+1d'
	    })
	});
	</script>
</body>
</html>