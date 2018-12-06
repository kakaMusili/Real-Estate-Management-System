<?php
//session_start();
global $con;
include('function/tenants_function.php');

echo $_SESSION['pro_id'];

if(isset($_POST['purchase']))
{
	header('Location:payment.php');
}

if(isset($_POST['deposit']))
{
	$contact=$_POST['mpesa_contact'];
	$code=$_POST['mpesa_code'];

	//checking contact
			if(!preg_match('/^[0-9]{9}$/',$contact))
			{
				$error = true;
				$contact_error2="Contacts can only contain Numbers";

			}
			if(strlen($contact)!=9)
			{
				$error = true;
				$contact_error1="Enter valid contact, check the length";
			}

	//checking mpesa code
	        if(strlen($code)!=5)
			{
				$error = true;
				$code_error1="Enter valid transaction code, contains 5 characters";
			}
			if($code!=12345)
			{
				$error = true;
				$code_error2="Invalid transaction code, please try again!!!";
			}

			else
			{
				$balance =70000;
				$_SESSION['balance'] +=$balance;

				$code_query="update customer set customer_balance='".$_SESSION['balance']."' WHERE customer_idno='".$_SESSION['idno']."'";

				$balance_query=mysqli_query($con,$code_query);

				if($balance_query)
				{
					$successmsg = "Amount of '".$balance ."' was successful deposited in your account!<br>";
				}else
				{
					$errormsg = "Error in updating...Please try again later!".mysqli_error();
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
								<li class="active"><a href="client_orders.php">Client Orders</a></li>
								<li class="active"><a href="#">FAQs</a></li>
							</ul>
					</div>

				</nav>

		</div>
	</div>
	<!--END OF NAVBAR-->
	<div class="container">
		<div class="row">
			<div class="col-md-5">
			<!--CLIENT SIDE MENU-->
				<a href="tenants.php">personal details</a><br>
				<a href="#">my orders</a><br>
				<a href="edit_tenants_details.php">edit personal details</a><br>
				<a href="update_balance.php">update balance</a><br>
				<a href="/makao/index.php">logout</a>
			</div>
			<div class="col-md-7">
				<img src='/makao/images/lipa_na_mpesa.png' height=400 width=400 style='border:2px solid black;' class='img-responsive'>
				<br>
				<p>To deposit the money: </p>
				<br>
				<ol type="1">
					<li> Go to the M-PESA Menu</li>
					<li>Select Lipa Na Mpesa</li>
					<li> Select Pay Bill</li>
					<li>Enter business number: 123456</li>
					<li>Enter account number : 123456</li>
					<li>Enter amount in KES</li>
					<li>Enter M-PESA Pin</li>
					<li>After you receive the confirmation SMS from MPesa, enter your Mobile Number and click on Continue</li>
					<li> Once the transaction is successful, kindly click on deposit  </li>
					<li> Once the transaction is successful, kindly click on deposit  </li>
					<li> Once the transaction is successful, kindly click on deposit  </li>
					<br>
					<li>put ---- 12345 ---- as transaction code</li
				</ol>
				<br>
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-horizontal" method="post">
					<div class="form-group">
						<label class="control-label col-md-3">Phone:</label>
						<div class="col-md-9 form-inline">
							<input type="text" value="+254" disabled="disabled" style="width:46px;"/>
							-
							<input name="mpesa_contact" type="text"  class="form-control" value="<?php echo $_SESSION['contacts'];?>"  required/>
                            <span class="help-block">Eg: 722123456</span>
							<span class="text-danger"><?php if (isset($error)) echo $contact_error1;  ?></span>
							<span class="text-danger"><?php if (isset($error)) echo $contact_error2;  ?></span>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">M-PESA Confirmation code:</label>
						<div class="col-md-9">
							<input name="mpesa_code" type="text" class="form-control" style="width:160px;" required/>
							<span class="text-danger"><?php if (isset($error))echo $code_error1;  ?></span>
							<span class="text-danger"><?php if (isset($error)) echo $code_error2;  ?></span>
						</div>
					 </div>
					 <div align="center">
						<input type='submit' name='deposit' class='btn btn-primary' value='deposit' style="align:center;">
					</div>


				</form>
					<span class="text-success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span>
					<span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
			</div>
			</div>
			<?php
			global $con;
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
								<img src='/makao/admin/property_images/$pro_image' height=400 width=400 style='border:2px solid black;' class='img-responsive'>
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
						<input type='submit' name='purchase' class='btn btn-primary' value='Continue'>
						</div>
						</form>
					</div>


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
					<li><a href="/makao/index.php">Sign Out</a></li>
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
