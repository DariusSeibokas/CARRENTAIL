<?php
require 'inc/custinit.php';
?>
<script type = "text/javascript">
$(document).ready(function(){
$("#county").change(function() {
    var data = { choice:$("#county").val()};
	$("#town").load('gettown.php',data);
});

 $('#Email').blur(function() {
     newemail=($(this).val());
     var search = { email:newemail};

     $.ajax({
	       type:'POST',
	       url:'getuser.php',
	       data: search,
	       error:processError,
	       success: processData
     });
  });


});


function processError(textStatus, xhr) {
    alert("An error occurred: " + xhr.status + " - " + xhr.textStatus);
}


function processData(user) {
      if(user=="False")
      {
          if (! $('#fail').length) {
             $('#Email').after('<p id="fail">This email address has already been chosen - Please enter again</p>');
           }
          $("#Email").css('background-color','#799');
          $("#Email").focus();

      }
      else {
          if ($('#fail').length) {
              $('#fail').remove();
          }
          $("#Email").css('background-color','white');
      }
}
</script>
<?php
$rand = rand(100000, 999999);

if (isset($_REQUEST['Submit'])) {
 $CustomerID=$rand;
 $FirstName=$_POST['FirstName'];
 $LastName=$_POST['LastName'];
 $DOB=$_POST['DOB'];
 $Street=$_POST['Street'];
 $County=$_POST['county'];
 $Town=$_POST['town'];
 $Phone=$_POST['Phone'];
 $Email=$_POST['Email'];

$customer->addcustomer($CustomerID, $FirstName, $LastName, $DOB, $Street, $County, $Town, $Phone, $Email);
try {
 $result =$customer->allcustomer();
 $count=count($result);
 if ($count>0)
 {

  $edit=false;
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
else{

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

?>
	<form action=""  class="form-horizontal" method="POST">
	<fieldset>
    <legend>Please Complete the Details</legend>
     
	 
     <div class ="form-group">
       <label for="FirstName" class="col-sm-2 control-label">First Name</label>
       <div class="col-sm-10">
        <input type="text" name="FirstName" id="FirstName"  maxlength="20" class="form-control" autofocus required pattern = "[A-Z][a-z]+?" title="Please enter a First name  with First Letter capitalised">
       </div>
     </div>
	 
	 <div class ="form-group">
       <label for="LasttName" class="col-sm-2 control-label">Last Name</label>
       <div class="col-sm-10">
        <input type="text" name="LastName" id="LastName"  maxlength="20" class="form-control" autofocus required pattern = "[A-Z][a-z]+?" title="Please enter a Last name  with First Letter capitalised">
       </div>
     </div>
	 
     
	 
	  <div class ="form-group">
<label for="DOB" class=" col-sm-2 control-label">Date of Birth</label>
 <div class="col-sm-10">
 <input type="date" name="DOB" id="DOB"   maxlength="20" class="form-control" required title="Please enter the Customer Date of Birth">

</div>
</div>

<div class ="form-group">
       <label for="Street" class="col-sm-2 control-label">Street</label>
       <div class="col-sm-10">
        <input type="text" name="Street" id="Street"   maxlength="20" class="form-control" required title="Please enter the Customer Street">
       </div>
     </div>
	
    <div class ="form-group">
	        <label for="county" class="col-sm-2 control-label">County</label>
	        <div class="col-sm-10">
	         <select name="county" id = "county" class="form-control">
	 	       <option selected value = "">Select One</option>
	 		           <?php
	 		           foreach ($counties as $row)
	 		            {
	 		            $county=$row['county'];
	 		            echo "<option value='$county'>$county</option>\n";
	 		           }
	 		           ?>
	         </select>
	        </div>
	      </div> 
    <div class ="form-group">
     <label for="town" class="col-sm-2 control-label">Town</label>
       <div class="col-sm-10">
	     <select id="town" name = "town" class="form-control">
		 		 	<option>Select One</option>
					<?php
					foreach($result as $row) {
     $town = $row['town'];
     echo "<option value = '$town'>$town</option>\n";
 }
?>

         </select>
       </div>
     </div>
	 
	 
	 
	 <div class ="form-group">
       <label for="Phone" class="col-sm-2 control-label">Phone Number</label></td>
       <div class="col-sm-10">
         <input type="text" name="Phone" id="Phone"  maxlength ="20"  class="form-control" required autofocus pattern="\d{10,15}" title="Please enter the Customer Phone Number">
       </div>
     </div>
	 
	 <div class ="form-group">
       <label for="Email" class="col-sm-2 control-label">Email Address</label></td>
       <div class="col-sm-10">
         <input type="email" name="Email" id="Email"  maxlength ="40"  class="form-control" required
	 	 pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$"  title="Please enter valid the Customer Email Address">
       </div>
     </div>
     
<div class = "form-group">
 <div class="col-sm-10 col-sm-offset-2">
       <input type="submit" class="btn btn-primary"value="Insert Customer Record" name = "Submit">
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