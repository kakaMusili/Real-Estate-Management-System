
<?php

include ("includes/db.php");
	if(isset($_POST['insert_property'])){


		global $con;
		//GETTING THE TEXT DATA FROM THE FIELDS

		$property_title=$_POST['property_title'];
		$property_owner=$_POST['property_owner'];
		$property_ownerID=$client_id;
		$property_cat=$_POST['property_cat'];
		$property_type=$_POST['property_type'];
		$property_price=$_POST['property_price'];
		$property_desc=$_POST['property_desc'];
		$bed=$_POST['bed'];
		$bath=$_POST['bath'];
		$property_loc=$_POST['property_loc'];
		$property_keywords=$_POST['property_keywords'];

		//GETTING THE IMAGE FROM THE FIELD
		$target_dir = "property_images/";
		$target_file = $target_dir . basename($_FILES["property_image"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);


			if (move_uploaded_file($_FILES["property_image"]["tmp_name"], $target_file))
			{
				//echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
				$property_image=basename( $_FILES["property_image"]["name"]);



				$insert_list= "insert into property(property_cat,property_type,property_title,property_owner,property_image,property_price,property_desc,bed,bath,property_loc,property_keywords) values($property_cat,$property_type,'$property_title','$property_owner','$property_image',$property_price,'$property_desc',$bed,$bath,$property_loc,'$property_keywords')";


								$insert_pro=mysqli_query( $con,$insert_list);

						if ($insert_pro)
					{
						$added = '<div class="alert alert-success">
						  <strong>Success!</strong> Property has been successfully added to the property_list.<br>
						  "The file ". basename( $_FILES["property_image"]["name"]). " has been uploaded.";
						 </div>';
					}
					else
					{
						$added='<div class="alert alert-danger">
									<strong>Failed!</strong> contact System Adminstrator.'.mysqli_error().'
								</div>';
					}


			} else {
				$added='<div class="alert alert-danger">
				<strong>Failed!</strong> Sorry, there was an error uploading your file.
				</div>';
				echo "";
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
	<div class="col-md-7 col-md-offset-2 well">

    <?php if(isset($added)){ echo $added.'</br>';} ?>
    <?php if(isset($id_error)){ echo $id_msg.'</br>';} ?>

	<form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" >
	<fieldset>
                    <legend>Add Property </legend>
	<div class="form-group">
		<label class="control-label col-xs-3">Property Title :</label>
		<div class="col-xs-4">
			<input type="input" class="form-control" name="property_title" required >
		</div>
	</div>
	<div class="form-group" >
		<label class="control-label col-xs-3">Property Owner :</label>
		<div class="col-xs-4">
		<select class="form-control" name="property_owner" required >
			<?php
			global $con;
				$get_cats="select customer_name from customer where customer_type='2'";

				$run_cats=mysqli_query( $con,$get_cats);

				while($row_cats = mysqli_fetch_array($run_cats)){

					$client_name=$row_cats['customer_name'];
					echo "<option value='$client_name'>$client_name</option>";
				}
			?>
		</select>
		</div>
	</div>
	<div class="form-group" >
		<label class="control-label col-xs-3">Property Category :</label>
		<div class="col-xs-4">
		<select class="form-control" name="property_cat" required >
			<?php
				$get_cats="select * from categories";

				$run_cats=mysqli_query( $con,$get_cats);

				while($row_cats = mysqli_fetch_array($run_cats)){

					$cat_id=$row_cats['cat_id'];
					$cat_title=$row_cats['cat_title'];
					echo "<option value='$cat_id'>$cat_title</option>";
				}
			?>
		</select>
		</div>
	</div>
	<div class="form-group" >
		<label class="control-label col-xs-3">Property Type:</label>
		<div class="col-xs-4">
		<select class="form-control" name="property_type" required>
			<?php
				$get_types="select * from types";

				$run_types=mysqli_query( $con, $get_types);

				while($row_types = mysqli_fetch_array($run_types)){

					$type_id=$row_types['type_id'];
					$type_title=$row_types['type_title'];
					echo "<option value='$type_id'>$type_title</option>";
				}
			?>
		</select>
	</div>
	</div>

	<div class="form-group">
		<label class="control-label col-xs-3">Property Image :</label>
		<div class="col-xs-4">
			<input type="file" class="form-control" name="property_image" required >
		</div>
	</div>
	<div class="form-group" >
		<label class="control-label col-xs-3">Property Price:</label>
		<div class="col-xs-4">
		<select class="form-control" name="property_price" required>
			<?php
				$get_prices="select * from prices";

				$run_prices=mysqli_query( $con,$get_prices);

				while($row_prices = mysqli_fetch_array($run_prices)){

					$price_id=$row_prices['price_id'];
					$prices=$row_prices['prices'];
					echo "<option value='$prices'>Ksh $prices.00</option>";
				}
			?>
		</select>
	</div>
	</div>
	<div class="form-group" >
		<label class="control-label col-xs-3">Location :</label>
		<div class="col-xs-4">
		<select class="form-control" name="property_loc" required>
			<?php
				$get_location="select * from location";

				$run_location=mysqli_query( $con,$get_location);

				while($row_location = mysqli_fetch_array($run_location)){

					$location_id=$row_location['location_id'];
					$location_title=$row_location['location_title'];
					echo "<option value='$location_id'>$location_title</option>";
				}
			?>
		</select>
	</div>
	</div>
	<div class="form-group" >
		<label class="control-label col-xs-3">Number of Bedrooms :</label>
		<div class="col-xs-4">
		<select class="form-control" name="bed" required>
			<?php
				$get_bed="select * from beds";

				$run_bed=mysqli_query( $con,$get_bed);

				while($row_bed = mysqli_fetch_array($run_bed)){

					$bed_id=$row_bed['bed_id'];
					$no_of_beds=$row_bed['no of beds'];
					echo "<option value='$bed_id'>$no_of_beds</option>";
				}
			?>
		</select>
	</div>
	</div>
	<div class="form-group" >
		<label class="control-label col-xs-3">Number of Bathsrooms:</label>
		<div class="col-xs-4">
		<select class="form-control" name="bath" required>
			<?php
				$get_bath="select * from baths";

				$run_bath=mysqli_query( $con,$get_bath);

				while($row_bath = mysqli_fetch_array($run_bath)){

					$baths_id=$row_bath['baths_id'];
					$no_of_baths=$row_bath['no_of_baths'];
					echo "<option value='$baths_id'>$no_of_baths</option>";
				}
			?>
		</select>
	</div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-3">Property Description:</label>
		<div class="col-xs-4">
			<textarea class="form-control" name="property_desc"  row="10"></textarea>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-3">Property Keywords :</label>
		<div class="col-xs-4">
			<input type="input" class="form-control" name="property_keywords" required>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-xs-3"></label>
		</div>
		<div class="col-xs-4">
	<input type="submit" name="insert_property" class="btn btn-primary" value="insert property">
	</div>
	</fieldset>
	</form>
	 </center>
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


























?>
