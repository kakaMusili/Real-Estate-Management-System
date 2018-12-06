<?php
//session_start();
include ("function/function.php");

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
								<li class="active"><a href="index.php">Home</a></li>
								<li class="active"><a href="#">Property Search</a></li>
								<li class="active"><a href="#">About Us</a></li>
								<li class="active"><a href="contact_us.php">Contact Us</a></li>
							</ul>
							<ul class="nav navbar-nav navbar-right">
								<li><a href="sign_up.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
								<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
							</ul>
					</div>

				</nav>

		</div>
	</div>
	<!-- END OF NAVBAR-->
	<br><br><br>
	<div class="container">

		<div class="row">
			<div class="col-md-8">
				<form  class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
				<fieldset>
					<legend>Contact us</legend>


					<div class="form-group">
						<label class="control-label col-xs-3">Email:</label>
						<div class="col-xs-4">
							<input type="input" class="form-control" name="email" required >
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-xs-3">your Comment:</label>
						<div class="col-xs-4">
							<textarea class="form-control" name="comment"  row=10 ></textarea>
						</div>
					</div>
					<div class="form-group">
							<input type="submit" name="send_comment" value="submit" class="btn btn-primary" />
					</div>
				</fieldset>
			</form>

			</div>

			<div class="col-md-4">

				<ul class="list-group">
				<b>Our Offices</b>
					<li class='list-group-item'>
						<b>Nairobi Branch</b><br>
						P.O BOX 2151-2100,<br>
						Nairobi<br>
						Along Waiyaki Road, opposite KCB bank.<br>
					</li>
					<li class='list-group-item'>
						<b>Mombasa Branch</b><br>
						P.O BOX 2151-80100,<br>
						Mombasa<br>
					</li>
					<li class='list-group-item'>
						<b>Kisumu Branch</b><br>
						P.O BOX 2151-40100,<br>
						kisumu<br>
						Along Raila Ondiga road.<br>
					</li>
				</ul>
			</div>

		</div>
	</div>





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
					<li><a href="staff_login.php">Staff Login</a></li>
					<li><a href="contact_us.php">Contact us</a></li>
				</ul>
			</div>
			</div>
		</div>
	 </footer>
	<!-- END OF THE FOOTER -->


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
