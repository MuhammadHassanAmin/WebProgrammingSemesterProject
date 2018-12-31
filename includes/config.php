<?php
	$path = 'http://localhost/repo/WebProgrammingSemesterProject/';
	session_start();

	$DBServer='localhost';
	$DBUser='root';
	$DBPass='';
	$DBName='hosteltracker';
	$db=mysqli_connect($DBServer, $DBUser, $DBPass, $DBName);
		
	 function sanitizeData($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	function getMemberId($email)
	{
		$DBServer='localhost';
		$DBUser='root';
		$DBPass='';
		$DBName='hosteltracker';
		$db=mysqli_connect($DBServer, $DBUser, $DBPass, $DBName);
        $sql="select id from houser where email='".$email."';";
        $result = mysqli_query($db,$sql);
        $product_array = mysqli_fetch_assoc($result);
        return $product_array['id'];
	}
?>