<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width-device-width, initial-scale-1.0">
    <title>Password Update</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style type="text/css">
    	*{
			margin: 0px;
			padding: 0px;
		}
		form
		{
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%,-50%);
			background-color: rgba(0, 0, 0, 0.3);
			width: 250px;
			border-radius: 5px;
			padding: 20px 25px 30px 25px;
		}
		form h3
		{
			margin-bottom: 15px;
			color: #30475e;
		}
		form  input
		{
			width: 100%;
			margin-bottom: 20px;
			background-color: transparent;
			border: none;
			border-bottom: 2px solid #30475e;
			border-radius: 0;
			padding: 5px 0;
			font-weight: 550;
			font-size: 14px;
			outline: none;
		}
		form button
		{
			font-weight: 550;
			font-size: 15px;
			color: white;
			background-color: #30475e;
			padding: 4px 10px;
			border: none;
			outline: none;
		}
    </style>
</head>
<body>


<?php
	
	require("connection.php");

	if(isset($_GET['email']) && isset($_GET['reset_token']))
	{
		date_default_timezone_set('Asia/kolkata');
		$date=date("y-m-d");
		$query="SELECT * from `users` WHERE `email`='$_GET[email]' AND `reset_token`='$_GET[reset_token]' AND `reset_token_expire`='$date'";
		$result=mysqli_query($con,$query);
		
		if($result)
		{
			if(mysqli_num_rows($result)==1)
			{
				echo"
					<form method='POST'>
						<h3>Create New Password</h3>
						<input type='password' placeholder='New Password' name='password'>
						<button type='submit' name='updatepassword'>UPDATE</button>
						<input type='hidden' name='email' value='$_GET[email]'>
					</form>
					";
			}
			else
			{
				echo "
				<script>
					alert('Link is invalid or expired...!!');
					window.location.href='index.php';
				</script>
				";
			}
		}
		else
		{
			echo "
				<script>
					alert('Cannot Run Query...!!');
					window.location.href='index.php';
				</script>
				";
		}
	}
?>


<!------------------------------------To Update Password---------------------------------->

<?php
	if(isset($_POST['updatepassword']))
	{
		$pass=password_hash($_POST['password'],PASSWORD_BCRYPT);
		$update="UPDATE `users` SET `password`='$pass',`reset_token`=NULL,`reset_token_expire`= NULL WHERE `email`='$_POST[email]'";
		if(mysqli_query($con,$update))
		{
			echo "
				<script>
					alert('Password Updated Successfully...!!');
					window.location.href='index.php';
				</script>
				";
		}
		else
		{
			echo "
				<script>
					alert('Can't Update the Password...!!');
					window.location.href='index.php';
				</script>
				";
		}
	}
?>
</body>
</html>