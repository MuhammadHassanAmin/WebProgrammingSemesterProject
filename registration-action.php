<?php

    include 'includes/config.php';
    if (isset($_POST['registration_action'])) {
        $username = sanitizeData($_POST['username']);
        $email = sanitizeData($_POST['email']);
        $ph = sanitizeData($_POST['ph']);
        $city = sanitizeData($_POST['city']);
        $address = sanitizeData($_POST['address']);
        $pw = randomPassword();
        $status = 'new';
       
        $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
        if ($conn->connect_error) {
            trigger_error('Database connection failed: ' .
            $conn->connect_error, E_USER_ERROR);
        }

        $sql="INSERT INTO houser (name,email,ph,city,address,status,pass)
             VALUES ('$username','$email','$ph','$city','$address','$status','$pw')";
        if($conn->query($sql) === false) {
            trigger_error('Wrong SQL: ' . $sql .
            ' Error: ' . $conn->error, E_USER_ERROR);
            } else {
            echo "Row inserted successfully<br />";
           /* echo "Last Inserted ID: " . $conn->insert_id . "<br />";
            echo "Affected Rows: " . $conn->affected_rows . "<br />";*/
            
        }

        $conn->close();
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
 
?>