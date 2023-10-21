<?php
	require('connection.php');

	if(isset($_POST['contact']))
	{
		$query="INSERT INTO `contact`(`name`, `email`, `message`) VALUES ('$_POST[name]','$_POST[email]','$_POST[message]')";
		$result=mysqli_query($con, $query);

		if($result)
		{
			echo "
					<script>
						alert('We will Contact you soon...!!');
						window.location.href='pg_2.php';
					</script>
					";
		}
		else
		{
			# If data cannot be inserted
			echo "
					<script>
						alert('Server Down...!!');
						window.location.href='pg_2.php';
					</script>
					";
		}

	}

?>