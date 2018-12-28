<?php
	 $path = 'http://localhost/repo/WebProgrammingSemesterProject/';
	 
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