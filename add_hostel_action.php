<?php
    include 'includes/config.php';

    if (isset($_POST['hostel_action'])) {
        $name = sanitizeData($_POST['hname']);
        $type = sanitizeData($_POST['htype']);
        $city = sanitizeData($_POST['hcity']);
        $sector = sanitizeData($_POST['hsector']);
        $address = sanitizeData($_POST['haddress']);
        $id = sanitizeData($_POST['id']);
       
        $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
        if ($conn->connect_error) {
            trigger_error('Database connection failed: ' .
            $conn->connect_error, E_USER_ERROR);
        }
        $sql="INSERT INTO hostels (hostel_name,hostel_type,hostel_city,hostel_sector,hostel_address,owner_id,badge)
             VALUES ('$name','$type','$city','$sector','$address','$id','0')";
        if($conn->query($sql) === false) {
            trigger_error('Wrong SQL: ' . $sql .
            ' Error: ' . $conn->error, E_USER_ERROR);
            } else {
            echo "Hostel added successfully<br />";
            header( "refresh:2;url=dashboard.php" );
        }
        $conn->close();
    }
?>