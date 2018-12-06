
<?php
include ("includes/db.php"); 
function get_client_orders()
	{
			//getting personal details in full
	    $get_customer_details="select * from orders";

		$get_customer_details_results=mysql_query($get_customer_details);
		
		if (mysql_num_rows($get_customer_details_results)>0)
		{
			echo "
				<table class=' table table-bordered table-condensed table-hover table-responsive'>
							<tr>
								<th>Buyers' Name</th>
								<th>Id Number</th>
								<th>Contacts</th>
								<th>Buyers' Email</th>
								<th>Property Type</th>
								<th>Property Title</th>
								<th>Property Price</th>
								<th>Amount Paid</th>
								<th>Landlord Share</th>
								<th>Date of Transaction</th>
								<th>Transaction Code</th>
								
							</tr>";
			

				while($results_row=mysql_fetch_array($get_customer_details_results))
				{
					$name=$results_row['customer_name'];
					$idno=$results_row['customer_idno'];
					$contact=$results_row['customer_contacts'];
					$email=$results_row['customer_email'];
					$property_type=$results_row['property_type'];	
					$property_title=$results_row['property_title'];	
					$property_price=$results_row['property_price'];	
					$amount_paid=$results_row['amount_paid'];
					$landlords_share=$results_row['landlord_amount'];
					$transaction_code=$results_row['transaction_code'];
					$date_of_transaction=$results_row['date_of_transaction'];
					
					
						
				
				
				echo"
							<tr>
								<td>$name</td>
								<td>$idno</td>
								<td>$contact</td>
								<td>$email</td>
								<td>$property_type</td>
								<td>$property_title</td>
								<td>$property_price</td>
								<td>$amount_paid</td>
								<td>$landlords_share</td>
								<td>$date_of_transaction</td>
								<td>$transaction_code</td>
							</tr>";
				}
						echo "</table>";
			}
			else
			{
				echo "You Dont Have Any Orders!!!";
			}
		
	}


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
						<a class="navbar-brand" href="/makao/index.php"><img src="/makao/images/logo4.png" style="max-width:120px; margin-top:-15px; " ></a>
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
		<?php echo get_client_orders(); ?>
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

