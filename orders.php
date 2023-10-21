<?php
	require('connection.php');

	if(isset($_POST['order']))
	{
		$query="INSERT INTO `orders`(`fullname`, `carname`, `email`, `address`, `contact_no`) VALUES ('$_POST[fullname]','$_POST[carname]','$_POST[email]','$_POST[address]', '$_POST[contact_no]')";
		$result=mysqli_query($con, $query);

		if($result)
		{
			echo "
					<script>
						alert('Your order has been placed successfully...!!');
						window.location.href='order_form.php';
					</script>
					";
		}
		else
		{
			# If data cannot be inserted
			echo "
					<script>
						alert('Server Down...!!');
						window.location.href='order_form.php';
					</script>
					";
		}

	}

?>