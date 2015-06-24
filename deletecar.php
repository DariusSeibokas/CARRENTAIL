<?php
require 'inc/init.php';
if (isset($_REQUEST['Submit'])) {
try
{   $RegNo=$_POST['RegNo'];
    $car->deleterecord($RegNo);
    $result =$car->allcar();
    $count=count($result);
    if ($count>0)
    {
     $edit=true;
     displaycar($result, $edit);
    }
     else exit ("<br>There are no cars to view!");
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
$RegNo = $_GET['RegNo'];
$Makes = array('Audi', 'BMW', 'Ford', 'Mitsubishi', 'Nissan', 'Opel', 'Toyota', 'Volkswagen');
$Models = array('A4', 'Q7', '3-Series', '5-Series', 'X5', 'Focus', 'Mondeo', 'Galaxy', 'Colt', 'Grandis',
 'Pajero', 'Juke', 'Micra', 'Quashqai', 'Zafira', 'Vectra', 'Insignia', 'Avensis', 'Yaris', 'Golf', 'Passat', 'Sharan');
$FuelTypes = array('Petrol', 'Diesel');
$Statuss = array('Available', 'Unavailable');

 try
 {
    $car = $car->onecar($RegNo);
    $RegNo= $car['RegNo'];
    $Make = $car['Make'];
    $Model= $car['Model'];
    $FuelType=$car['FuelType'];
    $NumberSeats=$car['NumberSeats'];
	$Status=$car['Status'];
	$Price=$car['Price'];
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

<form action = "" method = "post" id = "carentry" class="form-horizontal">
    <fieldset><legend>Delete a Car Record</legend>
        <div class ="form-group">
         <label for="RegNo" class="col-sm-2 control-label">Reg No</label>
         <div class="col-sm-10">
         <input type="text" name="RegNo" id="RegNo" class="form-control"  maxlength="10" readonly value = "<?php echo $RegNo ?>">
        </div></div>
		
		 
		 <div class ="form-group">
          <label for="Make" class="col-sm-2 control-label">Make</label>
          <div class="col-sm-10">
          <select name = "Make" id="Make" disabled value = "disabled"class="form-control" >

        <?php
        foreach($Makes as $make)
        {
          if ($Make==$make)
          {
           echo"<option selected = 'selected' value ='$make'>" . "$make</option>\n";
          }
           else {
             echo"<option value = '$make'>$make</option>\n";
          }
        }
        ?>
        </select>
        </div></div>
		
		<div class ="form-group">
          <label for="Model" class="col-sm-2 control-label">Model</label>
          <div class="col-sm-10">
          <select name = "Model" id="Model" disabled value = "disabled"class="form-control" >

        <?php
        foreach($Models as $model)
        {
          if ($Model==$model)
          {
           echo"<option selected = 'selected' value ='$model'>" . "$model</option>\n";
          }
           else {
             echo"<option value = '$model'>$model</option>\n";
          }
        }
        ?>
        </select>
        </div></div>
		
		<div class ="form-group">
          <label for="FuelType" class="col-sm-2 control-label">Fuel Type</label>
          <div class="col-sm-10">
          <select name = "FuelType" id="FuelType" disabled value = "disabled"class="form-control" >

        <?php
        foreach($FuelTypes as $fuelType)
        {
          if ($FuelType==$fuelType)
          {
           echo"<option selected = 'selected' value ='$fuelType'>" . "$fuelType</option>\n";
          }
           else {
             echo"<option value = '$fuelType'>$fuelType</option>\n";
          }
        }
        ?>
        </select>
        </div></div>
		
        <div class ="form-group">
          <label for="NumberSeats" class="col-sm-2 control-label">Number Seats</label>
          <div class="col-sm-10">
         <input type="text" name="NumberSeats" id="NumberSeats" class="form-control"  maxlength="2" disabled value = "<?php echo $NumberSeats ?>">
        </div></div>
		
        		  
           <div class ="form-group">
          <label for="Status" class="col-sm-2 control-label">Status</label>
          <div class="col-sm-10">
          <select name = "Status" id="Status" disabled = "disabled"class="form-control" >

        <?php
        foreach($Statuss as $status)
        {
          if ($Status==$status)
          {
           echo"<option selected = 'selected' value ='$status'>" . "$status</option>\n";
          }
           else {
             echo"<option value = '$status'>$status</option>\n";
          }
        }
        ?>
        </select>
        </div></div>
		
        <div class ="form-group">
          <label for="Price" class="col-sm-2 control-label">Price</label></td>
          <div class="col-sm-10">
          <input type="text" name="Price" id="Price" class="form-control"  maxlength ="5" disabled  value = "<?php echo $Price; ?>" required pattern="[0-9.]+">
        </div></div>
		
	    <div class="buttonarea">
    		<input type="submit" value="Delete Car Record" name = "Submit">
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