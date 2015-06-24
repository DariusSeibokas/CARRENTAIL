
<?php require 'inc/access.inc.php';
if (loggedIn())
{   header('Location:menu.php');}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Site Administration Area</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/mycss2.css" rel="stylesheet" >
<link href='css/bootstrap-datetimepicker.min.css' rel="stylesheet">

<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-datetimepicker.js"></script>


<body>
<div class = "container">
<div class="row">
<header class="col-md-12">
<h1 class="text-center">Car Rental Database Access</h1>
</header>
</div>
<br>
<div class="row">

<section class="col-xs-3">

 <img src="images/Pajero.png" alt = "Pajero" class="img-circle img-responsive"> 
  
</section>

<section class="col-xs-3">

 <img src="images/Golf.png" alt = "Golf" class="img-circle img-responsive"> 
  
</section>

<section class="col-xs-3">

 <img src="images/Opel.png" alt = "Opel" class="img-circle img-responsive"> 
  
</section>

<section class="col-xs-3">

 <img src="images/Nissan.png" alt = "Nissan" class="img-circle img-responsive">
 
</section>

</div>
<div class="row">
<div class="col-md-4 startup">
<img src="images/Audi.png" alt ="Audi" class="img-circle img-responsive">

</div>
<div class="col-md-3 startup">
<?php $action=false;?>



<ul>
<a class="start"   data-toggle="modal" href="#login">Car Rental</a><br>

</ul>

</div>
<div class="col-md-4 startup">
<img src="images/BMW.png" alt ="BMW" class="img-circle img-responsive">
</div>
</div>
<br>
<div class="row">

<section class="col-xs-3">

 <img src="images/Ford.png" alt = "Ford" class="img-circle img-responsive"> 
  
</section>

<section class="col-xs-3">

 <img src="images/Q7.png" alt = "Q7" class="img-circle img-responsive"> 
  
</section>

<section class="col-xs-3">

 <img src="images/Insignia.png" alt = "Insignia" class="img-circle img-responsive"> 
  
</section>

<section class="col-xs-3">

 <img src="images/Vw.png" alt = "Vw" class="img-circle img-responsive"> 
 
</section>

<div class = "modal fade" id = "login" role = "dialog">
			<div class = "modal-dialog">
				<div class = "modal-content">
					<form action="<?php echo  $_SERVER['PHP_SELF']; ?>" method="post" class = "form-horizontal">
						<div class = "modal-header">
							<h4>Car Rentail Database Access</h4>
</div>
	<div class = "modal-body">
	<div class = "form-group">
		<label for = "uname" class = "col-lg-2 control-label">Username:</label>
		<div class = "col-lg-10">
			<input type = "text" class = "form-control" id = "uname" name = "uname" autofocus>
       </div>
    </div>
	<div class = "form-group">
		<label for = "password1" class = "col-lg-2 control-label">Password:</label>
		<div class = "col-lg-10">
			<input type = "password" class = "form-control" id = "password1" name = "password1">
       </div>
    </div>
	<div class = "modal-footer">
		<a class = "btn btn-default" data-dismiss = "modal">Close</a>
		<button class = "btn btn-primary" type = "submit">Login</button>
</div>
</form>


</div>

</div>