<?php
	
	require('connection.php');
	session_start();
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;



	function sendMail($email, $verification_code)
	{
		require 'PHPMailer/PHPMailer.php';
		require 'PHPMailer/SMTP.php';
		require 'PHPMailer/Exception.php';

		$mail = new PHPMailer(true);      # Its an instance; passing 'true' enables exceptions

		try 
		{
    		//Server settings
	    	$mail->isSMTP();                                            //Send using SMTP
		    $mail->Host       = 'smtp.gmail.com';                     //Set the gmail server to send through
		    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
		    $mail->Username   = 'nspatil2403@gmail.com';                     //gmail username
		    $mail->Password   = 'yvagarqsvpuuhlbm';                               //gmail password
		    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
		    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

		    //Recipients
		    $mail->setFrom('nspatil2403@gmail.com', 'NSP WebTech');
		    $mail->addAddress($email);     


		    //Content
		    $mail->isHTML(true);                                  //Set email format to HTML
		    $mail->Subject = 'Email Verification From NSP WebTech';
		    $mail->Body    = "<b>Thanks For Registration...!!! </b>
		    	click the link below to verify the email address. 
		    	<a href='http://localhost/Car_Showroom_Management_System/verify.php?email=$email&verification_code=$verification_code'>Verify</a>";


		    $mail->send();
		    return true;
		} 
		catch (Exception $e) 
		{
		    return false;
		}

	}

	#----------------------------------------------For Login----------------------------------------------

	if(isset($_POST['login']))
	{
		$query="SELECT * FROM `users` WHERE `email`='$_POST[email_username]' OR `username`='$_POST[email_username]'";
		$result=mysqli_query($con, $query);

		if($result)
		{
			if(mysqli_num_rows($result)==1)
			{
				$result_fetch=mysqli_fetch_assoc($result);
				if($result_fetch['is_verified']==1)
				{
					if(password_verify($_POST['password'], $result_fetch['password']))
					{
						# If password matched
						$_SESSION['logged_in']=true;
						$_SESSION['username']=$result_fetch['username'];
						header("location: pg_2.php");
					}
					else
					{
						# If password doesn't matched
						echo "
							<script>
								alert('Incorrect Password...!!');
								window.location.href='index.php';
							</script>
							";
					}
				}

				else
				{
					echo "
							<script>
								alert('Email Not Verified...!!');
								window.location.href='index.php';
							</script>
							";
				}

				
			}
			else
			{
				echo "
					<script>
						alert('Invalid Email or Username...!!');
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





	#------------------------------------------For Registration-------------------------------------------

	if(isset($_POST['register']))
	{
		$user_exist_query="SELECT * FROM `users` WHERE `username`='$_POST[username]' OR `email`='$_POST[email]'";
		$result=mysqli_query($con, $user_exist_query);

		if($result)
		{
			if(mysqli_num_rows($result)>0)    # If any user has already taken username or email
			{
				$result_fetch=mysqli_fetch_assoc($result);
				if($result_fetch['username']==$_POST['username'])
				{
					# Error for username already registered
					echo "
						<script>
							alert('$result_fetch[username] - Username Already Exists..!!');
							window.location.href='index.php';
						</script>
						";
				}
				else
				{
					# Error for email already registered
					echo "
						<script>
							alert('$result_fetch[email] - Email Already Exists..!!');
							window.location.href='index.php';
						</script>
						";
				}
			}
			else # If no one has taken the existed username or email
			{
				$password=password_hash($_POST['password'], PASSWORD_BCRYPT);
				$verification_code=bin2hex(random_bytes(16));

				$query="INSERT INTO `users`(`firstname`, `lastname`, `username`, `email`, `password`,`verification_code`, `is_verified`) VALUES ('$_POST[firstname]','$_POST[lastname]','$_POST[username]','$_POST[email]','$password','$verification_code','0')";

				if(mysqli_query($con, $query) && sendMail($_POST['email'], $verification_code))
				{
					# If data inserted successfully
					echo "
						<script>
							alert('Registration Successfull...!!');
							window.location.href='index.php';
						</script>
						";
				}
				else
				{
					# If data cannot be inserted
					echo "
						<script>
							alert('Server Down...!!');
							window.location.href='index.php';
						</script>
						";
				}
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