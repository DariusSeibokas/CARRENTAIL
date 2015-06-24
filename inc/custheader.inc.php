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
<h1 class="text-center">Customers Database Access</h1>
</header>
</div>

<br>
<div class="row">
<nav class="col-md-12">
<ul class="nav nav-tabs">
<li><a href="menu.php?edit=<?php echo $action; ?>">Home Page</a></li>
<li><a href="car.php?edit=<?php echo $action; ?>">Cars For Rent</a></li>
<li class ="active"><a href="customer.php?edit=<?php echo $action; ?>">Customers Dat</a></li>
<li><a href="ord.php?edit=<?php echo $action; ?>">Booking Data</a></li>
</ul>
</nav>
</div>


<div class="row">

<nav class="navbar navbar-default" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
   <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
    <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
   </button>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse">
  <ul class="nav navbar-nav">


<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">Customers Retrieval<b class="caret"></b></a>
<ul class="dropdown-menu">
<?php $action=false;?>
<li><a href="customer.php?edit=<?php echo $action; ?>" >All Customers</a></li>
<li><a href="customerbylastname.php">Search by Last Name</a></li>
</ul></li>

<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">Customer Insertion<b class="caret"></b></a>
<ul class="dropdown-menu">
<li><a href="insertcustomer.php">Insert New Customer</a></li>

</ul></li>

<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">Customer Update<b class="caret"></b></a>
<ul class="dropdown-menu">
<?php $action=true;?>
<li><a href="customer.php?edit=<?php echo $action; ?>">Update/Delete Customer</a></li>
</ul></li>

</li>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">Administration<b class="caret"></b></a>
<ul class="dropdown-menu">
<li><a href="custedituser.php">Edit Password</a></li>
<li><a href="<?php echo 'index.php'?>?logout=1">Log Out</a></li>
</ul></li>

</ul></div>
</nav>
</div>

<div class="row">
<section class="col-md-12">