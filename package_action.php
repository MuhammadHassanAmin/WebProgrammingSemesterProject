<?php
    include 'includes/config.php';

    if (isset($_POST['package_action'])) {
        $name = sanitizeData($_POST['pname']);
        $price = sanitizeData($_POST['pprice']);
        $desc = sanitizeData($_POST['pdes']);
        $id = sanitizeData($_POST['hostel_id']);
       
        $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
        if ($conn->connect_error) {
            trigger_error('Database connection failed: ' .
            $conn->connect_error, E_USER_ERROR);
        }

        $sql="INSERT INTO packages (pack_name,pack_price,pack_des,hostel_id)
             VALUES ('$name','$price','$desc','$id')";
        if($conn->query($sql) === false) {
            trigger_error('Wrong SQL: ' . $sql .
            ' Error: ' . $conn->error, E_USER_ERROR);
            } else {
            echo "Package added successfully<br />";
            header( "refresh:2;url=ho_dashboard.php" );
           /* echo "Last Inserted ID: " . $conn->insert_id . "<br />";
            echo "Affected Rows: " . $conn->affected_rows . "<br />";*/
            
        }

        $conn->close();
    }
?>