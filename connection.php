<?php
	$con=mysqli_connect("localhost","root","","car_showroom");

	if(mysqli_connect_error())
	{
		echo "<script>alert('Cannot connect to the database');</script>";
		exit();
	}
?>
