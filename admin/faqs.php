
<?php
include ("includes/db.php"); 

?>

<!DOCTYPE html>
<?php include ("includes/db.php"); ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>makao bora</title>

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/makao/style/style.css" rel="stylesheet">

  </head>
  <body>
  
  <!-- NAVBAR SECTION -->
	<div class="container-fluid">
		<div class="row">
			
		<!--		<div class="logo"> <img src="images/makazi.png" class="img-responsive" /></div> navbar-fixed-top-->
				<nav class="navbar navbar-default ">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#"><img src="/makao/images/logo4.png" style="max-width:120px; margin-top:-15px; " ></a>
					</div>
					<div class="collapse navbar-collapse" id="myNavbar">
							<ul class="nav navbar-nav">
								<li class="active"><a href="insert_property.php">Home</a></li>
								<li class="active"><a href="client_orders.php">Client Orders</a></li>
								<li class="active"><a href="faqs.php">FAQs</a></li>
							</ul>
					</div>
					
				</nav>
			
		</div>
	</div>
	<!--END OF NAVBAR-->
  <div class="container">
	<div class="row">
	<div class="col-md-12">
		<?php echo "Not Yet activated, contact the Administrator"; ?>
	</div>
	<div class="col-md-0">
		
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
					<li><a href="/makao/index.php">Home</a></li>
					<li><a href="#">FAQs</a></li>
					<li><a href="makao/index.php">Sign Out</a></li>
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
	</body>
</html>

