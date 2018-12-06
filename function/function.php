<?php
session_start();
$con = mysqli_connect("localhost","root","","makao");


//mysqli_select_db('makao bora');

//getting categories
function getClient()
{
		global $con;
	$get_client="select * from clients";

				$run_client=mysqli_query($con, $get_client);

				while($row_client = mysqli_fetch_array($run_client)){

					$client_id=$row_client['client_id'];
					$client_title=$row_client['client_title'];
					echo "<option value='$client_id'>$client_title</option>";
				}

}

function getProperty()
{
	global $con;

	$get_pro="select * from property order by RAND() LIMIT 0,6";

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
					<img src='admin/property_images/$pro_image' height=250 width=250 style='border:2px solid black;' class='img-responsive'>
				</div>
				<div class='col-md-8 col-sm-8'>
					<h3>$pro_title</h3>
					<p>$pro_desc</p>
					<p><b> ksh $pro_price /-</b></p>
					<a href='details.php?pro_id=$pro_id'style='float:left;'><button type='button' class='btn btn-info'>more details</button></a>
				</div>
			</div>
			<br>
			</li>
		</ul>


		";
	}

}

	function get_client_deatils()
	{
			//getting personal details in full
		$get_details="select * from customer where customer_idno='".$_SESSION['idno']."'";

		$get_details_results=mysqli_query($con, $get_details);

		if($results_row=mysqli_fetch_array($get_details_results))
		{
			$name=$results_row['customer_name'];
			$idno=$results_row['customer_idno'];
			$email=$results_row['customer_email'];
			$contact=$results_row['customer_contacts'];
			$balance=$results_row['customer_balance'];
		}

		echo "
		<table class=' table table-bordered table-condensed table-hover table-responsive'>
					<tr>
						<th>Name :</th>
						<td> $name </td>
					</tr>
					<tr>
						<th>Id Number :</th>
						<td>  $idno</td>
					</tr>
					<tr>
						<th>contacts:</th>
						<td>  $contact</td>
					</tr>
					<tr>
						<th>Email :</th>
						<td>  $email</td>
					</tr>
					<tr class='danger'>
						<th>Balance:</th>
						<td> $balance </td>
					</tr>
				</table>";
	}

	function get_profile_pic()
	{
		$get_details="select * from customer where customer_idno='".$_SESSION['idno']."'";

		$get_details_results=mysqli_query($con, $get_details);

		if($results_row=mysqli_fetch_array($get_details_results))
		{
			$profile_pic=$results_row['customer_propic'];
		}

		echo "
		<img src='/makao/tenants/images/$profile_pic' height=100 width=100 style='border:2px solid black;' class='img-responsive img-circle'>";

	}


 function getCats()
 {
	 $get_cats="select * from categories";

						$run_cats=mysqli_query($con, $get_cats);

						while($row_cats = mysqli_fetch_array($run_cats)){

							$cat_id=$row_cats['cat_id'];
							$cat_title=$row_cats['cat_title'];
							echo "<option value='$cat_id'>$cat_title</option>";
						}
 }

 function getTypes()
 {
	 $get_types="select * from types";

				$run_types=mysqli_query($con, $get_types);

				while($row_types = mysqli_fetch_array($run_types)){

					$type_id=$row_types['type_id'];
					$type_title=$row_types['type_title'];
					echo "<option value='$type_id'>$type_title</option>";
				}
 }

 function getLocation()
 {
	 $get_location="select * from location";

				$run_location=mysqli_query($con, $get_location);

				while($row_location = mysqli_fetch_array($run_location)){

					$location_id=$row_location['location_id'];
					$location_title=$row_location['location_title'];
					echo "<option value='$location_id'>$location_title</option>";
				}
 }

 function getBeds()
 {
	 $get_bed="select * from beds";

				$run_bed=mysqli_query($con, $get_bed);

				while($row_bed = mysqli_fetch_array($run_bed)){

					$bed_id=$row_bed['bed_id'];
					$no_of_beds=$row_bed['no of beds'];
					echo "<option value='$bed_id'>$no_of_beds</option>";
				}
 }
 function getBaths()
 {
	 $get_bath="select * from baths";

				$run_bath=mysqli_query($con, $get_bath);

				while($row_bath = mysqli_fetch_array($run_bath)){

					$baths_id=$row_bath['baths_id'];
					$no_of_baths=$row_bath['no_of_baths'];
					echo "<option value='$baths_id'>$no_of_baths</option>";
				}
 }
 function getPrice()
 {
	 $get_prices="select * from prices";

				$run_prices=mysqli_query($con, $get_prices);

				while($row_prices = mysqli_fetch_array($run_prices)){

					$price_id=$row_prices['price_id'];
					$prices=$row_prices['prices'];
					echo "<option value='$prices'>Ksh $prices.00</option>";
				}
 }













?>
