<?php
require 'inc/ordinit.php';
if (isset($_REQUEST['Submit'])) {
try
{

    $OrderId=$_POST['OrderId'];
    $PickupDate=$_POST['PickupDate'];
	$RetDate=$_POST['RetDate'];
    $ord->updatecopyrecord($OrderId, $PickupDate, $RetDate);
    $OrderId=$_POST['OrderId'];
    $result =$ord->allord($OrderId);
    $count=count($result);
    if ($count>0)
    {
    $edit=true;
    displayord($result, $edit);
    }
     else exit ("<br>There are no Orders copiess to view!");
}
catch (PDOException $e)
{
   echo '<br>PDO Exception Caught.';
   echo 'Error with the database: <br>';
   echo 'SQL Query: ', $sql;
   echo 'Error: ' . $e->getMessage().'</p>';
}
}
 else {
$OrderId = $_GET['OrderId'];
try
{
    $ord = $ord->oneord($OrderId);
    $OrderId=$ord['OrderId'];
    $CustomerID=$ord['CustomerID'];
	$fName=$ord['FirstName'];
	$lName=$ord['LastName'];
	$Name=$fName." ".$lName;
    $RegNo=$ord['RegNo'];
	$fCar=$ord['Make'];
	$lCar=$ord['Model'];
	$Car=$fCar." ".$lCar;
	$PickupDate=$ord['PickupDate'];
	$RetDate=$ord['RetDate'];
	
}
catch (PDOException $e)
{
   echo '<br>PDO Exception Caught.';
   echo 'Error with the database: <br>';
   echo 'SQL Query: ';
   echo 'Error: ' . $e->getMessage().'</p>';
}

?>
</p>
<form action = "" method = "post" id = "bookentry" class="form-horizontal">
    <fieldset><legend>Update an Order Record</legend>
	
        <div class ="form-group">
         <label for="OrderId" class="col-sm-2 control-label">Order ID</label>
         <div class="col-sm-10">
         <input type="text" name="OrderId" id="OrderId" class="form-control"   readonly value = "<?php echo $_GET['OrderId']?>">
        </div></div>
		
        <div class ="form-group">
         <label for="CustomerID" class="col-sm-2 control-label">Customer ID</label>
         <div class="col-sm-10">
         <input type="text" name="CustomerID" id="CustomerID" class="form-control"   readonly value = "<?php echo $CustomerID ?>">
        </div></div>
		
		<div class ="form-group">
         <label for="Name" class="col-sm-2 control-label">Customer Name</label>
         <div class="col-sm-10">
         <input type="text" name="Name" id="Name" class="form-control"   readonly value = "<?php echo $Name ?>">
        </div></div>
		
         <div class ="form-group">
          <label for="RegNo" class="col-sm-2 control-label">Reg No</label>
          <div class="col-sm-10">
         <input type="text" name="RegNo" id="RegNo" class="form-control"  readonly  value = "<?php  echo $RegNo ?>">
        </div></div>
		
		<div class ="form-group">
         <label for="Car" class="col-sm-2 control-label">Car</label>
         <div class="col-sm-10">
         <input type="text" name="Car" id="Car" class="form-control"   readonly value = "<?php echo $Car ?>">
        </div></div>
		
        <div class ="form-group">
		  <label for="PickupDate" class=" col-sm-2 control-label">Pickup Date</label>
		  <div class="col-sm-10">
		   <div class="input-group date" id='PickupDate' name="PickupDate" data-date-format="yyyy-mm-dd" >
			  <input class="form-control" type="text" name="PickupDate" value="<?php echo $PickupDate; ?>">
			  <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
			</div>
		   </div>
		</div>

       <div class ="form-group">
		  <label for="RetDate" class=" col-sm-2 control-label">Return Date</label>
		  <div class="col-sm-10">
		   <div class="input-group date" id='RetDate' name="RetDate" data-date-format="yyyy-mm-dd" >
			  <input class="form-control" type="text" name="RetDate" value="<?php echo $RetDate; ?>">
			  <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
			</div>
		   </div>
		</div>
		
		
	    <div class="buttonarea">
    		<input type="submit" value="Update Order Record" name = "Submit">
    		<input type="button" value="Cancel" onclick="history.back();" >
	     </div>
    </fieldset>
</form>
<?php
}?>
</section>
</div>
</div>

	<script type="text/javascript">
	$(document).ready(function() {
	    $('#PickupDate').datepicker({
	      startDate: '-1m',
          endDate: '+0d'
	    })
	});
	</script>

	<script type="text/javascript">
	$(document).ready(function() {
	    $('#RetDate').datepicker({
	      startDate: '-1m',
          endDate: '+0d'
	    })
	});
	</script>

</body>
</html>
