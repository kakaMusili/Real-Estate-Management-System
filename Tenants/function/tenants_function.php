<?php
session_start();
$con = mysqli_connect("localhost","root","","makao");

//mysqli_select_db('makao bora');

//getting categories
function getClient()
{
	global $con;
	$get_client="select * from clients";

				$run_client=mysqli_query( $con,$get_client);

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

	$run_pro=mysqli_query( $con,$get_pro);

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
					<a href='details.php?pro_id=$pro_id'style='float:left;'>More Details</a>
				</div>
			</div>
			<br>
			</li>
		</ul>


		";
	}

}

	function display_client_deatils()
	{
		global $con;
			//getting personal details in full
		$get_details="select * from customer where customer_idno='".$_SESSION['idno']."'";

		$get_details_results=mysqli_query( $con,$get_details);

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
		global $con;

		$get_details="select * from customer where customer_idno='".$_SESSION['idno']."'";

		$get_details_results=mysqli_query($con,$get_details);

		if($results_row=mysqli_fetch_array($get_details_results))
		{
			$profile_pic=$results_row['customer_propic'];

		}

		echo "
		<img src='images/$profile_pic' height=100 width=100 style='border:2px solid black;' class='img-responsive img-circle'>";

	}

	/* function get_client_details()
	{
		$get_details="select * from customer where customer_idno='".$_SESSION['idno']."'";

		$get_details_results=mysqli_query($get_details);

		if($results_row=mysqli_fetch_array($get_details_results))
		{
			$name=$results_row['customer_name'];
			$idno=$results_row['customer_idno'];
			$email=$results_row['customer_email'];
			$contact=$results_row['customer_contacts'];
			$balance=$results_row['customer_balance'];
		}

	} */

	function get_client_orders()
	{
		global $con;
			//getting personal details in full
		$get_customer_details="select * from orders where customer_idno='".$_SESSION['idno']."'";

		$get_customer_details_results=mysqli_query( $con,$get_customer_details);

		if (mysqli_num_rows($get_customer_details_results)>0)
		{
			echo "<table class=' table table-bordered table-condensed table-hover table-responsive'>
							<tr>
								<th>Name </th>
								<th>Id Number</th>
								<th>Contacts</th>
								<th>Email</th>
								<th>Property Type</th>
								<th>Property Title</th>
								<th>Property Price</th>
								<th>Amount Paid</th>
								<th>Date of Transaction</th>
								<th>Transaction Code</th>

							</tr>";

				while($results_row=mysqli_fetch_array($get_customer_details_results))
				{
					$name=$results_row['customer_name'];
					$idno=$results_row['customer_idno'];
					$contact=$results_row['customer_contacts'];
					$email=$results_row['customer_email'];
					$property_type=$results_row['property_type'];
					$property_title=$results_row['property_title'];
					$property_price=$results_row['property_price'];
					$amount_paid=$results_row['amount_paid'];
					$transaction_code=$results_row['transaction_code'];
					$date_of_transaction=$results_row['date_of_transaction'];





				echo "

							<tr>
								<td>$name</td>
								<td>$idno</td>
								<td>$contact</td>
								<td>$email</td>
								<td>$property_type</td>
								<td>$property_title</td>
								<td>$property_price</td>
								<td>$amount_paid</td>
								<td>$date_of_transaction</td>
								<td>$transaction_code</td>
				</tr>";}
						echo "</table>";
						}

			else
			{
				echo "You Dont Have Any Orders!!!";
			}

	}

	function print_reciept()
	{
		global $con;
			//getting personal details in full
		$get_customer_details="select * from orders where transaction_code='".$_SESSION['code']."'";

		$get_customer_details_results=mysqli_query( $con, $get_customer_details);

		if (mysqli_num_rows($get_customer_details_results)>0)
		{


				if($results_row=mysqli_fetch_array($get_customer_details_results))
				{
					$name=$results_row['customer_name'];
					$idno=$results_row['customer_idno'];
					$contact=$results_row['customer_contacts'];
					$email=$results_row['customer_email'];
					$property_type=$results_row['property_type'];
					$property_title=$results_row['property_title'];
					$property_price=$results_row['property_price'];
					$amount_paid=$results_row['amount_paid'];
					$transaction_code=$results_row['transaction_code'];
					$date_of_transaction=$results_row['date_of_transaction'];



				}

				echo "
				<center><table class=' table table-bordered table-condensed table-hover table-responsive'>

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
					<tr>
						<th>Property Title :</th>
						<td>$property_title</td>
					</tr>
					<tr>
						<th>Property Price :</th>
						<td>$property_price</td>
					</tr>
					<tr class='danger'>
						<th>Amount Paid :</th>
						<td>$amount_paid</td>
					</tr>
					<tr>
						<th>Date of Transaction :</th>
						<td>$date_of_transaction</td>
					</tr>
					<tr>
						<th>Transaction Code :</th>
						<td>$transaction_code</td>
					</tr>

				</table></center>";
			}
			else
			{
				echo "You Dont Have Any Orders!!!";
			}

	}



?>
