<?php
require 'inc/custinit.php';

?>
<script type = "text/javascript">
$(document).ready(function(){
$("#county").change(function() {
    var data = { choice:$("#county").val()};
	$("#town").load('gettown.php',data);
});
});
</script>
<?php
if (isset($_REQUEST['Submit'])) { 
try
{   $CustomerID=$_POST['CustomerID'];
    
    
	$Street=$_POST['Street'];
	$County=$_POST['county'];
	$Town=$_POST['town'];
	$Phone=$_POST['Phone'];
	$Email=$_POST['Email'];
    $customer->updaterecord($CustomerID, $Street, $County, $Town, $Phone, $Email);
    $result =$customer->allcustomer();
    $count=count($result);
    if ($count>0)
    {
     $edit=true;
     displaycustomer($result, $edit);
    }
     else exit ("<br>There are no customers to view!");
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
 $CustomerID = $_GET['CustomerID'];

 //$Counties = $county;
 try {
    $sql = "SELECT * FROM County order by county";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    $count= $stmt->rowCount();
	if ($count==0) {
			exit("There are no county values for the Customer!");
    }
    $counties=$stmt->fetchAll(PDO::FETCH_ASSOC);
	
}
catch(PDOException $e) {
  echo $e->getMessage();
}
 try {
    $sql = "SELECT * FROM towns";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    $count= $stmt->rowCount();
	if ($count==0) {
			exit("There are no town values!");
    }
    $towns=$stmt->fetchAll(PDO::FETCH_ASSOC);
	
}
catch(PDOException $e) {
  echo $e->getMessage();
}

 try
 {
 
    $customer = $customer->onecustomer($CustomerID);
    $CustomerID= $customer['CustomerID'];
    $FirstName = $customer['FirstName'];
    $LastName = $customer['LastName'];
    $DOB=$customer['DOB'];
    $Street=$customer['Street'];
	$County=$customer['County'];
	$Town=$customer['Town'];

	$Phone=$customer['Phone'];
	$Email=$customer['Email'];
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
    <fieldset><legend>Update a Customer Record</legend>
        <div class ="form-group">
		
         <label for="CustomerID" class="col-sm-2 control-label">Customer ID</label>
         <div class="col-sm-10">
         <input type="text" name="CustomerID" id="CustomerID" class="form-control"  maxlength="9" readonly value = "<?php echo $CustomerID ?>">
        </div></div>
		
        <div class ="form-group">
          <label for="FirstName" class="col-sm-2 control-label">First Name</label>
          <div class="col-sm-10">
         <input type="text" name="FirstName" id="FirstName" class="form-control" disabled  value = "<?php echo $FirstName; ?>">
        </div></div>
		
		<div class ="form-group">
          <label for="LastName" class="col-sm-2 control-label">Last Name</label>
          <div class="col-sm-10">
         <input type="text" name="LastName" id="LastName" class="form-control" disabled  value = "<?php echo $LastName; ?>">
        </div></div>
		
		<div class ="form-group">
          <label for="DOB" class="col-sm-2 control-label">Date of Birth</label>
          <div class="col-sm-10">
         <input type="date" name="DOB" id="DOB" class="form-control" disabled  value = "<?php echo $DOB; ?>">
        </div></div>
		
		<div class ="form-group">
          <label for="Street" class="col-sm-2 control-label">Street</label>
          <div class="col-sm-10">
         <input type="text" name="Street" id="Street" class="form-control"    value = "<?php echo $Street; ?>">
        </div></div>
		
		  <div class ="form-group">
	        <label for="county" class="col-sm-2 control-label">County</label>
	        <div class="col-sm-10">
	         <select name="county" id = "county" class="form-control">
	 	       
	 		           <?php 
	 		           foreach ($counties as $cc) {
					     $thec=$cc['county'];
	 		            if ($County==$thec)
          {
           echo"<option selected = 'selected' value ='$County'>" . "$County</option>\n";
          }
           else {
             echo"<option value = '$thec'>$thec</option>\n";
          }
		  }
	 		           ?>
	         </select>
	        </div>
	      </div> 
    <div class ="form-group">
     <label for="town" class="col-sm-2 control-label">Town</label>
       <div class="col-sm-10">
	     <select id="town" name = "town" class="form-control" >
		 		 	
					<?php
					foreach($towns as $rows) {  
     $townss = $rows['town'];
	 if ($Town==$townss)
	 {
	 echo"<option selected = 'selected' value ='.$Town.'>".$Town.'</option>';
	 }
	 else{
     echo "<option value = '$townss'>$townss</option>\n";
	 
 }
 }
?>

         </select>
       </div>
     </div>
		 
		
		<div class ="form-group">
          <label for="Phone" class="col-sm-2 control-label">Phone Number</label>
          <div class="col-sm-10">
         <input type="text" name="Phone" id="Phone" class="form-control"   value = "<?php echo $Phone; ?>">
        </div></div>
		
        <div class ="form-group">
          <label for="Email" class="col-sm-2 control-label">Email</label>
          <div class="col-sm-10">
         <input type="text" name="Email" id="Email" class="form-control"     value = "<?php echo $Email; ?>">
          </div></div>
		  

	    <div class="buttonarea">
    		<input type="submit" value="Update Customer Record" name = "Submit">
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
