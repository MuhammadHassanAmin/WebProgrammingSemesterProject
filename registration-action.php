<?php
    include 'includes/config.php';
    if (isset($_POST['registration_action'])) {
        $username = sanitizeData($_POST['username']);
        $email = sanitizeData($_POST['email']);
        $ph = sanitizeData($_POST['ph']);
        $city = sanitizeData($_POST['city']);
        $address = sanitizeData($_POST['address']);
        $role = sanitizeData($_POST['role']);
        $pw = sanitizeData($_POST['pass']);
        $status = 'de_activated';
        if(checkEmail($email)==$email)
        {
            echo 'Email already exits!';
            header( "refresh:1;url=registration.php" );
        }
        else
        {
        $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
        if ($conn->connect_error) {
            trigger_error('Database connection failed: ' .
            $conn->connect_error, E_USER_ERROR);
        }
        $sql="";
        if(!empty($_FILES["profile"]["name"]))
        {
            if ((($_FILES["profile"]["type"] == "image/png") || ($_FILES["profile"]["type"] == "image/jpeg") || ($_FILES["profile"]["type"] == "image/pjpeg"))
            && ($_FILES["profile"]["size"] < 1000000))
            {
                if ($_FILES["profile"]["error"] > 0)
                {
                    echo "Return Code: " . $_FILES["profile"]["error"] . "<br />";
                    echo "File error.";
                    header( "refresh:1;url=registration.php" );
                }
                else
                {
                    if (file_exists("graphics/" . $_FILES["profile"]["name"]))
                        {
                            echo $_FILES["profile"]["name"] . " already exists. ";
                            $sql="INSERT INTO houser (name,email,ph,city,address,status,pass,role)
                            VALUES ('$username','$email','$ph','$city','$address','$status','$pw','$role')";
                        }
                    else
                        {
                            move_uploaded_file($_FILES["profile"]["tmp_name"],
                            "graphics/" . $_FILES["profile"]["name"]);
                            echo "Stored in: " . "graphics/" . $_FILES["profile"]["name"];
                            $pic = $_FILES["profile"]["name"];
                            $ext = pathinfo($pic, PATHINFO_EXTENSION);
                            $save_picture = 'profile'.microtime().'.'.$ext;
                            rename('graphics/'.$pic,'graphics/'.$save_picture);
                            $sql="INSERT INTO houser (name,email,ph,city,address,status,pass,picture,role)
                             VALUES ('$username','$email','$ph','$city','$address','$status','$pw','$save_picture','$role')";
                        }
                }
            }
            else
            {
                echo "Invalid file type or size!<br>File be jpg/png.";
                header( "refresh:1;url=registration.php" );
            }
        }
        else
        {
            $sql="INSERT INTO houser (name,email,ph,city,address,status,pass,picture,role)
             VALUES ('$username','$email','$ph','$city','$address','$status','$pw','nopic','$role')";
        }
        if($conn->query($sql) === false) {
            trigger_error('Wrong SQL: ' . $sql .
            ' Error: ' . $conn->error, E_USER_ERROR);
            header( "refresh:1;url=registration.php" );
            } else {
            echo 'Your login credentials are sended to your email!';
                /* echo "Last Inserted ID: " . $conn->insert_id . "<br />";
            echo "Affected Rows: " . $conn->affected_rows . "<br />";*/
            header( "refresh:2;url=login.php" );
        }

        $conn->close();
        }
    }
    function randomPassword() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }
    function checkEmail($email)
	{
		$db=mysqli_connect("localhost","root","","hosteltracker");
        $sql="select email from houser where email='".$email."';";
        $result = mysqli_query($db,$sql);
        $product_array = mysqli_fetch_assoc($result);
        return $product_array['email'];
	}
?>