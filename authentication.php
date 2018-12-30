<?php 
	include 'includes/config.php';

	if (isset($_POST['email'])&&isset($_POST['pass'])) {

		//$conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
		$conn=mysqli_connect("localhost","root","","hosteltracker");
        if ($conn->connect_error) {
            trigger_error('Database connection failed: ' .
            $conn->connect_error, E_USER_ERROR);
        }

        $em = $_POST['email'];
        $pw = $_POST['pass'];

		$sql="SELECT * FROM houser where email ='".$em."' AND pass='".$pw."'";

	
		//$result = mysqli_query($conn,$sql);
		$result = $conn->query($sql);
		if($result->num_rows > 0){
			while ($row = mysqli_fetch_assoc($result)) {
				$_SESSION['valid'] = true;
	        	$_SESSION['timeout'] = time();
				$_SESSION['email'] = $row['email'];
				$_SESSION['role'] = $row['role'];
				$_SESSION['uname'] = $row['name'];
			}
			if($_SESSION['role']=='user')
			{
				header('Location: main.php');
			}
			else if($_SESSION['role']=='houser')
			{
				header('Location: dashboard.php');
			}
			//header( "refresh:5;url=ho_dashboard.php" );
		}
		else
		{
			?>
			<script type="text/javascript">
				alert("Invalid Credentails!");
			</script>
			<?php
			header( "refresh:1;url=login.php" );
			
		}
		
 	
 }
?>