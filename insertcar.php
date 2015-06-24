<?php
require 'inc/init.php';

if (isset($_REQUEST['Submit'])) {
 $RegNo=$_POST['RegNo'];
 $Make=$_POST['Make'];
 $Model=$_POST['Model'];
 $FuelType=$_POST['FuelType'];
 $NumberSeats=$_POST['NumberSeats'];
 $Status=$_POST['Status'];
 $Price=$_POST['Price'];

$car->addcar($RegNo, $Make, $Model, $FuelType, $NumberSeats, $Status, $Price);
try {
 $result =$car->allcar();
 $count=count($result);
 if ($count>0)
 {
   $edit=false;
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
else{
?>
<script type = "text/javascript">
$(document).ready(function(){
$("#Make").change(function() {
    var data = { choice:$("#Make").val()};
	$("#Model").load('getmodel.php',data);
});
});
</script>
<?php
try {
    $sql = "SELECT distinct make FROM makemodel order by make";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    $count= $stmt->rowCount();
	if ($count==0) {
			exit("There are no Car Makes available!");
    }
    $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
}
catch(PDOException $e) {
  echo $e->getMessage();
}


?>
	<form action=""  class="form-horizontal" method="POST">
	<fieldset>
    <legend>Please Complete the Details</legend>
     <div class ="form-group">
       <label for="RegNo" class="col-sm-2 control-label">Reg No</label>
       <div class="col-sm-10">
        <input type="text" name="RegNo" id="RegNo"  maxlength="10" class="form-control" required  pattern="[0-9]{2,3}[A-Za-z]{1,2}[0-9]{3,5}" title="Please enter plate number">
       </div>
     </div>
	 
	 <div class ="form-group">
       <label for="Make" class="col-sm-2 control-label">Make</label>
       <div class="col-sm-10">
        <select name="Make" id = "Make" class="form-control">
	      <option selected value = "">Select One</option>
	 		           <?php
	 		           foreach ($result as $row)
	 		            {
	 		            $make=$row['make'];
	 		            echo "<option value='$make'>$make</option>\n";
	 		           }
	 		           ?>
	  	 </select>
       </div>
     </div>
	 
	  <div class ="form-group">
       <label for="Model" class="col-sm-2 control-label">Model</label>
       <div class="col-sm-10">
        <select name="Model" id = "Model" class="form-control">
	       <option selected value = "">Select One</option>
	 		           <?php
	 		           foreach ($result as $row)
	 		            {
	 		            $model=$row['model'];
	 		            echo "<option value='$model'>$model</option>\n";
	 		           }
	 		           ?>
		   
	  	 </select>
       </div>
     </div>
	 
	 <div class ="form-group">
       <label for="FuelType" class="col-sm-2 control-label">Fuel Type</label>
       <div class="col-sm-10">
        <select name="FuelType" id = "FuelType" class="form-control">
	       <option value ="Select">Select</option>
		   <option value ="Petrol">Petrol</option>
	       <option value  ="Diesel">Diesel</option>
	      
	  	 </select>
       </div>
     </div>
	 
     <div class ="form-group">
       <label for="NumberSeats" class="col-sm-2 control-label">Number Seats</label>
       <div class="col-sm-10">
        <input type="text" name="NumberSeats" id="NumberSeats"  maxlength="2" class="form-control" required title="Please enter number of seats">
       </div>
     </div>
	 
	 <div class ="form-group">
       <label for="Status" class="col-sm-2 control-label">Status</label>
       <div class="col-sm-10">
        <select name="Status" id = "Status" class="form-control">
	       <option value ="Select">Select</option>
		   <option value ="Available">Available</option>
	       <option value  ="Unavailable">Unavailable</option>
	      
	  	 </select>
       </div>
     </div>
	 
     
     <div class ="form-group">
       <label for="Price" class="col-sm-2 control-label">Price</label></td>
       <div class="col-sm-10">
         <input type="text" name="Price" id="Price"  maxlength ="4"  class="form-control" required pattern="[0-9.]+" title="Please enter the car's daily price">
       </div>
     </div>
	 
<div class = "form-group">
 <div class="col-sm-10 col-sm-offset-2">
       <input type="submit" class="btn btn-primary"value="Insert Car Record" name = "Submit">
       <input type="reset" class="btn btn-primary"value="Clear the Info" >
	 </div>
	 </div>
    </fieldset>
    </form>
<?php
}
?>
</section>
</div>
</div>

</body>
</html>