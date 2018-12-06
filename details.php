<?php
//session_start();
include ("function/function.php");

if(isset($_POST['purchase']))
{


	header('Location:/makao/login.php');


}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>makao bora</title>

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="style/style.css" media="all">

  </head>
  <body>

  <!-- NAVBAR SECTION -->
	<div class="container-fluid">
		<div class="row">

		<!--		<div class="logo"> <img src="images/makazi.png" class="img-responsive" /></div> -->
				<nav class="navbar navbar-default navbar-fixed-top">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#"><img src="images/logo4.png" style="max-width:120px; margin-top:-15px; " ></a>
					</div>
					<div class="collapse navbar-collapse" id="myNavbar">
							<ul class="nav navbar-nav">
								<li class="active"><a href="#">Home</a></li>
								<li class="active"><a href="#">Property Search</a></li>
								<li class="active"><a href="#">About Us</a></li>
								<li class="active"><a href="#">Contact Us</a></li>
							</ul>
							<ul class="nav navbar-nav navbar-right">
								<li><a href="sign_up.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
								<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
							</ul>
					</div>

				</nav>

		</div>
	</div>

    <!-- CHECKING DETAILS OF THE SELECTED PROPERTY SECTION -->
	<div class="container">

		<div class="row">
			<h3> More details about</h3>
		</div>

	<?php
	global $con;

	if (isset($_GET['pro_id']))	{

	$property_id=$_GET['pro_id'];

	$_SESSION['pro_id']=$property_id;

	$get_pro="select * from property where property_id='$property_id'";

	$run_pro=mysqli_query($con, $get_pro);

	while ($row_pro=mysqli_fetch_array($run_pro))
	{
		$pro_id=$row_pro['property_id'];
					$pro_cat=$row_pro['property_cat'];
					$pro_type=$row_pro['property_type'];
					$pro_title=$row_pro['property_title'];
					$pro_owner=$row_pro['property_owner'];
					$pro_image=$row_pro['property_image'];
					$pro_price=$row_pro['property_price'];
					$pro_desc=$row_pro['property_desc'];
					$pro_bed=$row_pro['bed'];
					$pro_bath=$row_pro['bath'];
					$pro_loc=$row_pro['property_loc'];

		echo "
		<ul class='list-group'>
			<li class='list-group-item'>
		<br>
			<div class='row'>
				<div class='col-md-4 col-sm-4'>
					<img src='admin/property_images/$pro_image' height=400 width=400 style='border:2px solid black;' class='img-responsive'>
				</div>
				<div class='col-md-8 col-sm-8'>
					<h3>$pro_title</h3>
					<p>$pro_desc</p>
					<p><b> ksh $pro_price /-</b></p>
					<a href='index.php'style='float:left;'>Go Back</a>
				</div>
			</div>
			<br>
			</li>
		</ul>
		<div class='row' >
			<form action='". $_SERVER['PHP_SELF']."'   class='form-horizontal' method='post' >
			<div class='col-xs-4'>
			<input type='submit' name='purchase' class='btn btn-primary' value='Purchase'>
			</div>
			</form>
		</div>


		";
	}

	}





	?>
	</div>


	 <!--  END OF CHECKING DETAILS OF THE SELECTED PROPERTY SECTION -->

	 <!-- FOOTER SECTION -->

	 <footer class="site-footer">
		<div class="container">
			<div class="row">
				<div class="col-md-5">
				<h4>Contact Address </h4>
					<address>
						#999, Siriba Campus,<br>
						Maseno,<br>
						Kenya.
					</address>
				</div>
		</div>
		<div class="bottom-footer">
			<div class="col-md-5">&copy;Copyright Makao Bora 2017.</div>
			<div class="col-md-7">
				<ul class="footer-nav">
					<li><a href="index.php">Home</a></li>
					<li><a href="login.php">Staff Login</a></li>
					<li><a href="contact_us.php">Contact us</a></li>
				</ul>
			</div>
			</div>
		</div>
	 </footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
		$('#myslider').carousel();

	}
	);
	</script>
  </body>
</html>
