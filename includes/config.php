<?php
	 $path = 'http://localhost/Web_Project_2/';
	 
	 session_start();
 		$DBServer='localhost';
        $DBUser='root';
        $DBPass='';
        $DBName='hosteltracker';
	 function sanitizeData($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
?>