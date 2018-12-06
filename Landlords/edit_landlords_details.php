<?php
//session_start();
include ("function/landlords_function.php");

	$error=false;
		if (isset($_POST['signup']))
		{
			$name=$_POST['customer_name'];
			$contact=$_POST['customer_contact'];
			$idno=$_POST['customer_idno'];
			$email=$_POST['customer_email'];
			$pass1=$_POST['customer_pass1'];
			$pass2=$_POST['customer_pass2'];


				//GETTING THE IMAGE FROM THE FIELD
						$target_dir = "images/";
						$target_file = $target_dir . basename($_FILES["profile_pic"]["name"]);
						$uploadOk = 1;
						$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

			//name can contain only alpha character and space

			if (!preg_match("/^[a-zA-Z ]+$/",$name))
			{
				$error = true;
				$name_error = "Name must contain only alphabets and space";

			}
			//checking contact
			if(!preg_match('/^[0-9]{10}$/',$contact))
			{
				$error = true;
				$contact_error2="Contacts can only contain Numbers";

			}
			if(strlen($contact)!=10)
			{
				$error = true;
				$contact_error1="Enter valid contact, check the length";
			}


			//checking ID number
			if (strlen($idno)!=8)
			{
				$error=true;
				$idno_error1="Enter valid ID Number, check length";
			}
			if(!preg_match('/^[0-9]{8}$/',$idno))
			{
				$error=true;
				$idno_error2=" ID Number can only contain numbers";
			}
			if(!filter_var($email,FILTER_VALIDATE_EMAIL))
			{
				$error = true;
				$email_error = "Please Enter Valid Email ID";
			}
			if(strlen($pass1) < 6) {
				$error = true;
				$password_error = "Password must be minimum of 6 characters";
			}
			if($pass1 != $pass2) {
				$error = true;
				$cpassword_error = "Password and Confirm Password doesn't match";
			}

		else
			{

				if(move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $target_file))
				{
				$profile_pic=basename( $_FILES["profile_pic"]["name"]);


				$customer_insert="update customer set customer_idno=$idno,customer_name='$name', customer_contacts=$contact,customer_email='$email',customer_password='$pass1',customer_propic='$profile_pic' where customer_idno='".$_SESSION['idno']."'";

				$insert_query=mysql_query($customer_insert);



				if($insert_query)
				{
					$successmsg = "Details were Updated successfully!<br>";
				}else
				{
					$errormsg = "Error in updating...Please try again later!".mysql_error();
				}
				}
				 else {
				$errormsg='<div class="alert alert-danger">
				<strong>Failed!</strong> Sorry, there was an error uploading your file.
				</div>';
				echo "";
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
			<div class="col-md-5">
			<!--CLIENT SIDE MENU-->
			<a href="landlord.php">personal details</a><br>
			<a href="Landlords_order.php">my orders</a><br>
			<a href="edit_landlords_details.php">edit personal details</a><br>
			<a href="withdraw.php">Widthdraw cash</a><br>
			<a href="/makao/index.php">logout</a>
			</div>
			<div class="col-md-7">

			<!-- FORM FOR EDITTING PERSONAL DETAILS-->

							<form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-horizontal" method="post" enctype="multipart/form-data">
				  <fieldset>
									<legend>Edit your Persoanl Details</legend>

				  <div class="form-group">
						<label class="control-label col-xs-2"> Names :</label>
						<div class="col-xs-4">
							<input type="input" class="form-control" name="customer_name" placeholder="fullnames" required value="<?php echo $_SESSION['name']; if($error) echo $name; ?>" >
							<span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span>
							</div>
					<div class="form-group">
						<label class="control-label col-xs-2">Contacts :</label>
						<div class="col-xs-4">
							<input type="input" class="form-control" name="customer_contact"  required  value="<?php echo $_SESSION['contacts']; if($error) echo $contact; ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-xs-2">Profile Picture :</label>
						<div class="col-xs-4">
							<input type="file" class="form-control" name="profile_pic" required >
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-xs-2"> Id Number :</label>
						<div class="col-xs-4">
							<input type="input" class="form-control" name="customer_idno" placeholder="eg. 3132333435" required value="<?php echo $_SESSION['idno'];if($error) echo $idno; ?>">
							<span class="text-danger"><?php if (isset($idno_error1)) echo $idno_error1.'<br>'; ?></span>
							<span class="text-danger"><?php if (isset($idno_error2)) echo $idno_error2; ?></span>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-xs-2"> Email :</label>
						<div class="col-xs-4">
							<input type="input" class="form-control" name="customer_email" placeholder="eg. some@thing.com" required value="<?php echo $_SESSION['email'];if($error) echo $email; ?>" />
							<span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-xs-2"> Password :</label>
						<div class="col-xs-4">
							<input type="password" class="form-control" name="customer_pass1" required >
							<span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-xs-2"> Confirm Password :</label>
						<div class="col-xs-4">
							<input type="password" class="form-control" name="customer_pass2" placeholder="confirm password"required >
							 <span class="text-danger"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-xs-2"></label>
						</div>
						<div class="col-xs-4">
					<input type="submit" name="signup" class="btn btn-primary" value="Update Details">
					</div>
					  </fieldset>
				  </form>
					<span class="text-success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span>
					<span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>



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
