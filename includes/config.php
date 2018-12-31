<?php
	 $path = '/';
	 
	 session_start();
 		$DBServer='localhost';
        $DBUser='root';
        $DBPass='';
		$DBName='hosteltracker';
		$db=mysqli_connect("localhost","root","","hosteltracker");
		
	 function sanitizeData($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	function getMemberId($email)
	{
		$db=mysqli_connect("localhost","root","","hosteltracker");
        $sql="select id from houser where email='".$email."';";
        $result = mysqli_query($db,$sql);
        $product_array = mysqli_fetch_assoc($result);
        return $product_array['id'];
	}
?>