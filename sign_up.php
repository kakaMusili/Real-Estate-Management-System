<?php
//session_start();
include ("function/function.php");

global $con;
$error=false;
if (isset($_POST['signup']))
{
	$name=$_POST['customer_name'];
	$contact=$_POST['customer_contact'];
	$gender=$_POST['customer_gender'];
	$idno=$_POST['customer_idno'];
	$type=$_POST['customer_type'];
	$email=$_POST['customer_email'];
	$pass1=$_POST['customer_pass1'];
	$pass2=$_POST['customer_pass2'];

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

	if(!isset($gender))
	{
		$error=true;
		$gender_error="You must select your gender";

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

	if(!$error)
	{
		$customer_insert="insert into customer(customer_id,customer_idno,customer_name,customer_gender,customer_contacts,customer_email,customer_type,customer_balance,customer_propic,customer_password) values('',$idno,'$name','$gender',$contact,'$email',$type,'','','$pass1')";

		$insert_query=mysqli_query($con,$customer_insert);

		if($insert_query)
		{
			$successmsg = "Successfully Registered! <a href='login.php'>Click here to Login</a>";
		}else
		{
			$errormsg = "Error in registering...Please try again later!".mysqli_error();
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
    <title>makao bora/signup</title>

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">

  </head>
  <body>
	<div class="container">
  <div class="row">
  <div class="col-md-7 col-md-offset-3 well">

  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-horizontal" method="post">
  <fieldset>
                    <legend>Register With us</legend>

  <div class="form-group">
		<label class="control-label col-xs-2"> Names :</label>
		<div class="col-xs-4">
			<input type="input" class="form-control" name="customer_name" placeholder="fullnames" required value="<?php if($error) echo $name; ?>" >
			<span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-2">Contacts :</label>
		<div class="col-xs-4">
			<input type="input" class="form-control" name="customer_contact" placeholder="eg. 0725330643" required  value="<?php if($error) echo $contact; ?>">
			<span class="text-danger"><?php if (isset($contact_error1)) echo $contact_error1; ?></span>
			<span class="text-danger"><?php if (isset($contact_error2)) echo $contact_error2; ?></span>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-2"></label>
		<div class="col-xs-4">
			<div class="radio" >
				<label><input type="radio" name="customer_gender" value="male">Male</label>
			</div>
			<div class="radio">
				<label><input type="radio" name="customer_gender" value="female">Female</label>
			</div>
			<span class="text-danger"><?php if (isset($gender_error)) echo $gender_error; ?></span>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-2"> Id Number :</label>
		<div class="col-xs-4">
			<input type="input" class="form-control" name="customer_idno" placeholder="eg. 3132333435" required value="<?php if($error) echo $idno; ?>">
			<span class="text-danger"><?php if (isset($idno_error1)) echo $idno_error1.'<br>'; ?></span>
			<span class="text-danger"><?php if (isset($idno_error2)) echo $idno_error2; ?></span>
		</div>
	</div>
	<div class="form-group" >
		<label class="control-label col-xs-2">Client Type:</label>
		<div class="col-xs-4">
		<select class="form-control" name="customer_type" required >
			<?php getClient();?>
		</select>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-2"> Email :</label>
		<div class="col-xs-4">
			<input type="input" class="form-control" name="customer_email" placeholder="eg. some@thing.com" required value="<?php if($error) echo $email; ?>" />
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
			<input type="password" class="form-control" name="customer_pass2" placeholder="confirm password" required >
			 <span class="text-danger"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-2"></label>
		</div>
		<div class="col-xs-4">
	<input type="submit" name="signup" class="btn btn-primary" value="Register">
	</div>
	  </fieldset>
  </form>
  <span class="text-success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span>
            <span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>

  </div>
  </div>
</div>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
