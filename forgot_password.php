<?php
	
	require("connection.php");

	#-----------------------------------------------Send Mail----------------------------------------------
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;



	function sendMail($email, $reset_token)
	{
		require 'PHPMailer/PHPMailer.php';
		require 'PHPMailer/SMTP.php';
		require 'PHPMailer/Exception.php';

		$mail = new PHPMailer(true); 

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
		    $mail->Subject = 'Password Reset Link From NSP WebTech';
		    $mail->Body    = "We got a request from you to reset your password...!! <br>
		    	click the link below: <br>
		    	<a href='http://localhost/Car_Showroom_Management_System/update_pass.php?email=$email&reset_token=$reset_token'>Reset Password</a>";


		    $mail->send();
		    return true;
		} 
		catch (Exception $e) 
		{
		    return false;
		}
	}

	#-------------------------------------------------Reset link-----------------------------------------------

	if(isset($_POST['send_reset_link']))
	{
		$query="SELECT * FROM `users` WHERE `email`='$_POST[email]'";
		$result=mysqli_query($con,$query);

		if($result)
		{
			if(mysqli_num_rows($result)==1)
			{
				$reset_token=bin2hex(random_bytes(16));
				date_default_timezone_set('Asia/kolkata');
				$date=date("y-m-d");
				$query="UPDATE `users` SET `reset_token`='$reset_token',`reset_token_expire`='$date' WHERE `email`='$_POST[email]'";
				if(mysqli_query($con,$query) && sendMail($_POST['email'],$reset_token))
				{
					echo "
						<script>
							alert('Password Reset Link Sent To Mail...!!');
							window.location.href='index.php';
						</script>
						";
				}
				else
				{
					echo "
						<script>
							alert('Server Down try again later...!!');
							window.location.href='index.php';
						</script>
						";
				}
			}
			else
			{
				echo "
					<script>
						alert('Email Not Found...!!');
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