<?php
//session_start();

include('function/tenants_function.php');

//echo $_SESSION['pro_id'];

global $con;
$property_id=$_SESSION['pro_id'];

				$get_pro="select * from property where property_id='$property_id'";

				$run_pro=mysqli_query($con,$get_pro);

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
				}

				$product_price=($pro_price/100);

				if(isset($_POST['buy_now']))
				{
					//GETTING CLIENTS DETAILS

					$get_details="select * from customer where customer_idno='".$_SESSION['idno']."'";

					$get_details_results=mysqli_query($con,$get_details);

					if($results_row=mysqli_fetch_array($get_details_results))
					{
						$name=$results_row['customer_name'];
						$idno=$results_row['customer_idno'];
						$email=$results_row['customer_email'];
						$contact=$results_row['customer_contacts'];
						$c_type=$results_row['customer_type'];
						$balance=$results_row['customer_balance'];
					}

					if (!isset($balance)){
						$error=true;
						$error_msg="balance is not set".mysqli_error();

					}
					else
					{
					if ($balance<$pro_price)
					{
						$error=true;
						$error_msg="Sorry, You Have Insufficient balance <br> click here to update Your Account <a href='update_balance.php'>Update Balance Amount</a>".$balance;
					}
					else
					{

						//CHANGING THE STATE OF THE PURCHASED PROPERTY
							 echo $property_state="update property set property_status=1 where property_id='".$pro_id."'";

							$property_query=mysqli_query($con,$property_state);

						//DEDUCTING FROM THE CUSTOMERS BALANCE

						$customer_balance=($balance-$pro_price);

						$cust_balance="update customer set customer_balance='".$customer_balance."' WHERE customer_idno='".$_SESSION['idno']."'";

						$customer_query_balance=mysqli_query($con,$cust_balance);

						//UPDATING LANDLORDS BALANCE
						//calculating the commission.
						$agent_commision=(0.15*$pro_price);
						$landlord_share=($pro_price-$agent_commision);

						$landlord_balance +=$landlord_share;

						$landlord_amount="update customer set customer_balance='".$landlord_balance."' where customer_name='".$pro_owner."'";

						$landlord_query=mysqli_query($con,$landlord_amount);


						//TRANSACTION CODE
						 function createRandomPassword() {

							$chars = "abcdefghijkmnopqrstuvwxyz023456789";
							srand((double)microtime()*1000000);
							$i = 0;
							$pass = '' ;

							while ($i <= 7) {
								$num = rand() % 33;
								$tmp = substr($chars, $num, 1);
								$pass = $pass . $tmp;
								$i++;
							}

							return $pass;

						} ;
						$transaction_code=createRandomPassword();
						$_SESSION['code']=$transaction_code;
						//INSERTING INTO ORDERS TABLE
						$date="CURRENT_TIMESTAMP()";



						//INSERTING INTO ORDERS TABLE $$($order_query)
						 $order="insert into orders (customer_name,customer_idno,customer_contacts,customer_email,customer_type,property_cat,property_type,property_title,property_owner,property_price,amount_paid,agent_amount,landlord_amount,transaction_code,date_of_transaction) values('$name',$idno,'$contact','$email',$c_type,$pro_cat,$pro_type,'$pro_title','$pro_owner',$pro_price,$pro_price,$agent_commision,$landlord_share,'$transaction_code',$date)";

						$order_query=mysqli_query($con,$order);

							if(($property_query)&&($customer_query_balance)&&($landlord_query)&&($order_query))
								{
									//$successmsg = "Transaction was successfull!<br>";
									header('Location:payment_success.php');
								}else
								{
									$errormsg = "Error in Transaction!".mysqli_error();
								}
					}
					}
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
    <link href="/makao/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="/makao/style/style.css" media="all">

  </head>
  <body>
  <div class='container'>
	<div class="row">
		<div class="col-md-3 col-md-offset-9">
		 <?php  echo get_profile_pic().'<br>';
		 echo 'Welcome '.$_SESSION['name'];?>
		</div>

	</div>

  </div>

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
								<li class="active"><a href="index.php">Home</a></li>
								<li class="active"><a href="#">Client Orders</a></li>
								<li class="active"><a href="#">FAQs</a></li>
							</ul>
					</div>

				</nav>

		</div>
	</div>
	<!--END OF NAVBAR-->
	<div class="container">
		<div class="row">
			<div class="col-md-3">
			<!--CLIENT SIDE MENU-->
				<a href="tenants.php">personal details</a><br>
				<a href="#">my orders</a><br>
				<a href="edit_tenants_details.php">edit personal details</a><br>
				<a href="update_balance.php">update balance</a><br>
				<a href="/makao/index.php">logout</a>
			</div>

			<!-- PAYPAL BUY NOW BUTTON-->
			<div class="col-md-9">
			<div class="col-md-5">
				<p>Use your account balance </p>
				<form action="<?php echo $_SERVER['PHP_SELF']?>" class="form-horizontal" method="post">

				<img src='/makao/images/balance2.jpg' style='border:2px solid black;' class='img-responsive'>

				<br>
				<div align="center">
				<input type='submit' name='buy_now' class='btn btn-primary' value='Buy Now' style="align:center;">
				</div>
				<span class="text-danger"><?php if (isset($error)) { echo $error_msg; } ?></span>
				<span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
				<span class="text-success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span>

				<br>
				</form>

			</div>
			<div class="col-md-2">
			<br><br><br><br>
			 OR
			 </div>
			<div class="col-md-5">
				<br>
				<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">

				  <!-- Identify your business so that you can collect the payments. -->
				  <input type="hidden" name="business" value="personalseller2018@gmail.com">

				  <!-- Specify a Buy Now button. -->
				  <input type="hidden" name="cmd" value="_xclick">

				  <!-- Specify details about the item that buyers will purchase. -->
				  <input type="hidden" name="item_name" value="<?php echo $pro_title; ?>">
				  <input type="hidden" name="amount" value="<?php echo $product_price; ?>">
				  <input type="hidden" name="currency_code" value="USD">

				  <input type="hidden" name="return" value="127.0.0.1/makao/paypal_success.php"/>
				  <input type="hidden" name="cancel_return" value="127.0.0.1/makao/cancel_return.php"/>



				  <!-- Display the payment button. -->
				  <input type="image" name="submit" border="0" src="/makao/images/buynow1.jpg" class='img-responsive'alt="Buy Now">
				  <img alt="" border="0" width="1" height="1" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >

				</form>
				<br>
			</div>
			</div>
				<!-- END OF PAYPAL BUY NOW BUTTON-->
			</div>
			<?php
			if(isset($_SESSION['pro_id']) && !empty($_SESSION['pro_id'])) {


			   $property_id=$_SESSION['pro_id'];

				$get_pro="select * from property where property_id='$property_id'";

				$run_pro=mysqli_query($con,$get_pro);

				while ($row_pro=mysqli_fetch_array($run_pro))
				{
					$pro_id=$row_pro['property_id'];
					$pro_cat=$row_pro['property_cat'];
					$pro_type=$row_pro['property_type'];
					$pro_title=$row_pro['property_title'];
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
								<img src='/makao/admin/property_images/$pro_image' height=400 width=400 style='border:2px solid black;' class='img-responsive'>
							</div>
							<div class='col-md-8 col-sm-8'>
								<h3>$pro_title</h3>
								<p>$pro_desc</p>
								<p><b> ksh $pro_price /-</b></p>
							</div>
						</div>
						<br>
						</li>
					</ul>
					";
				}

			}

			?>

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
					<li><a href="#">FAQs</a></li>
					<li><a href="index.php">Sign Out</a></li>
				</ul>
			</div>
			</div>
		</div>
	 </footer>
	<!-- END OF THE FOOTER -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/makao/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
