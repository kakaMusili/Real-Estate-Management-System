<?php
//session_start();
include ("function/function.php");

global $con;

if(isset($_POST['login']))
{
	$email=$_POST['email'];
	$password=$_POST['password'];

	//USED DURING THE PURCHASE OF A HOUSE
	$pro_id= $_SESSION['pro_id'];


	$login_query= "select * from customer where customer_email='".$email."' and customer_password='".$password."'";

	$login_result=mysqli_query($con,$login_query);

	if ($row=mysqli_fetch_array($login_result))
	{
		$email=$row['customer_email'];
		$password=$row['customer_password'];

		//to be used for sessioning

		$_SESSION['idno']=$row['customer_idno'];
		$_SESSION['name']=$row['customer_name'];
		$_SESSION['propic']=$row['customer_propic'];
		$_SESSION['balance']=$row['customer_balance'];
		$_SESSION['contacts']=$row['customer_contacts'];
		$_SESSION['email']=$row['customer_email'];
		$_SESSION['client_type']=$row['customer_type'];

		if ($_SESSION['client_type']==1)
		{
			header('Location:Tenants/tenants.php');

		}
		else
		{
			header('Location:Landlords/landlord.php');
		}





	}
	else
	{
		$errormsg = "Incorrect Email or Password!!!".mysqli_error();
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
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">

  </head>
  <body>
   <div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 well">
			<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
				<fieldset>
					<legend>Login</legend>


					<div class="form-group">
						<label for="name">Email</label>
						<input type="text" name="email" placeholder="Your Email" required class="form-control" />
					</div>
					<div class="form-group">
						<label for="name">Password</label>
						<input type="password" name="password" placeholder="Your Password" required class="form-control" />
					</div>
					<div class="form-group">
							<input type="submit" name="login" value="Login" class="btn btn-primary" />
					</div>
				</fieldset>
			</form>
				<span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
		</div>
	</div>
	<div class="row">
        <div class="col-md-4 col-md-offset-4 text-center">
        New User? <a href="sign_up.php">Sign Up Here</a>
        </div>
    </div>
   </div>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
