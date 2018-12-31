<?php
    include 'includes/config.php';
    if (isset($_POST['feature_action'])) {
        $name = sanitizeData($_POST['fname']);
        $desc = sanitizeData($_POST['fdes']);
        $id = sanitizeData($_POST['hostel_id']);   
        $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
        if ($conn->connect_error) {
            trigger_error('Database connection failed: ' .
            $conn->connect_error, E_USER_ERROR);
        }
        $sql="INSERT INTO features (feature_name,feature_des,hostel_id)
             VALUES ('$name','$desc','$id')";
        if($conn->query($sql) === false) {
            trigger_error('Wrong SQL: ' . $sql .
            ' Error: ' . $conn->error, E_USER_ERROR);
            } else {
            echo "Feature added successfully<br />";
            header( "refresh:2;url=ho_dashboard.php" );         
        }
        $conn->close();
    }
?>