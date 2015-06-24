<?php
require 'inc/custinit.php';
if (isset($_REQUEST['Submit'])) {
try
{   $CustomerID=$_POST['CustomerID'];
    $customer->deleterecord($CustomerID);
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
$County = array('Antrim', 'Armagh', 'Carlow', 'Cavan', 'Clare', 'Cork', 'Derry', 'Donegal', 'Down', 'Dublin',
'Fermanagh', 'Galway', 'Kerry', 'Kildare', 'Kilkenny', 'Laois', 'Leitrim', 'Limerick', 'Longford', 'Louth', 
'Mayo', 'Meath', 'Monaghan', 'Offlay', 'Roscommon', 'Sligo', 'Tipperary', 'Tyrone', 'Waterford', 'Westmeath');

 try
 {
    $customer = $customer->onecustomer($CustomerID);
    $CustomerID= $customer['CustomerID'];
    $FirstName = $customer['FirstName'];
    $LastName = $customer['LastName'];
    $DOB=$customer['DOB'];
    $Street=$customer['Street'];
	$Town=$customer['Town'];
	$County=$customer['County'];
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
    <fieldset><legend>Delete a Customer Record</legend>
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
         <input type="text" name="Street" id="Street" class="form-control" disabled  value = "<?php echo $Street; ?>">
        </div></div>
		
		<div class ="form-group">
          <label for="Town" class="col-sm-2 control-label">Town</label>
          <div class="col-sm-10">
         <input type="text" name="Town" id="Town" class="form-control" disabled  value = "<?php echo $Town; ?>">
        </div></div>
		
		 <div class ="form-group">
          <label for="County" class="col-sm-2 control-label">County</label>
          <div class="col-sm-10">
          <select name = "County" id="County" disabled = "disabled"class="form-control" >

        <?php
        foreach($County as $County)
        {
          if ($County==$County)
          {
           echo"<option selected = 'selected' value ='$County'>" . "$County</option>\n";
          }
           else {
             echo"<option value = '$County'>$County</option>\n";
          }
        }
        ?>
        </select>
        </div></div>
		
		<div class ="form-group">
          <label for="Phone" class="col-sm-2 control-label">Phone Number</label>
          <div class="col-sm-10">
         <input type="text" name="Phone" id="Phone" class="form-control" disabled  value = "<?php echo $Phone; ?>">
        </div></div>
		
        <div class ="form-group">
          <label for="Email" class="col-sm-2 control-label">Email</label>
          <div class="col-sm-10">
         <input type="text" name="Email" id="Email" class="form-control"  disabled   value = "<?php echo $Email; ?>">
          </div></div>
		  
         
	    <div class="buttonarea">
    		<input type="submit" value="Delete Customer Record" name = "Submit">
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