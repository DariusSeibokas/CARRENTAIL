<?php require 'inc/ordinit.php';

if (isset($_REQUEST['Submit'])) {
try
{
    $OrderId=$_GET['OrderId'];;
    $ord->deletecopyrecord($OrderId);
    $result =$ord->allord();
    $count=count($result);
    if ($count>0)
    {
     $edit=true;
     displayord($result, $edit);
    }
    else {
 	$result =$ord->allord();
 	$count=count($result);
 	if ($count>0)
 	 {
 	  $edit=true;
 	  displayord($result, $edit);
 	  }
 	  else exit ("<br>There are no orders to view!");
}
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
    $RegNo=$ord['RegNo'];
	$PickupDate=$ord['PickupDate'];
	$RetDate=$ord['RetDate'];
}
catch (PDOException $e)
{
   echo '<br>PDO Exception Caught.';
   echo 'Error with the database: <br>';
   echo 'SQL Query: ', $sql;
   echo 'Error: ' . $e->getMessage().'</p>';
}
?>
</p>
<form action = "" method = "post" id = "bookentry" class="form-horizontal">
    <fieldset><legend>Delete an Order Record</legend>
	
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
          <label for="RegNo" class="col-sm-2 control-label">Reg No</label>
          <div class="col-sm-10">
         <input type="text" name="RegNo" id="RegNo" class="form-control"  readonly  value = "<?php  echo $RegNo ?>">
        </div></div>
		
       <div class ="form-group">
          <label for="PickupDate" class="col-sm-2 control-label">Pickup Date</label></td>
          <div class="col-sm-10">
          <input type="text" name="PickupDate" id="PicupDate" class="form-control"  disabled value = "<?php  echo $PickupDate?>" >
        </div></div>
		
		<div class ="form-group">
          <label for="RetDate" class="col-sm-2 control-label">Return Date</label></td>
          <div class="col-sm-10">
          <input type="text" name="RetDate" id="RetDate" class="form-control"  disabled value = "<?php echo $RetDate ?>" >
        </div></div>

	    <div class="buttonarea">
    		<input type="submit" value="Delete Order Record" name = "Submit">
    		<input type="button" value="Cancel" onclick="history.back();" >
	     </div>
    </fieldset>
</form>
<?php
}?>
</section>
</div>
</body>
</html>
