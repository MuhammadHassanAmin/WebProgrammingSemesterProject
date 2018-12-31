<?php

    include 'includes/config.php';
    if (isset($_POST['contact_action'])) {
        $name = sanitizeData($_POST['name']);
        $email = sanitizeData($_POST['email']);
        $sub = sanitizeData($_POST['sub']);
        $msg = sanitizeData($_POST['msg']);
       
        $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
        if ($conn->connect_error) {
            trigger_error('Database connection failed: ' .
            $conn->connect_error, E_USER_ERROR);
        }

        $sql="INSERT INTO contact (name,email,subject,msg)
             VALUES ('$name','$email','$sub','$msg')";
        
        if($conn->query($sql) === false) {
            trigger_error('Wrong SQL: ' . $sql .
            ' Error: ' . $conn->error, E_USER_ERROR);
            } else {
            echo "Your query is successfully sended!<br/>";
            saveInCookie($name,$email);
            header( "refresh:2;url=contact_us.php" );

        }   
        $conn->close();
    }
    function saveInCookie($name,$email)
    {
      setcookie('FullName', $name, time() + (86400 * 30), "/");
      setcookie('Email', $email, time() + (86400 * 30), "/");
    }
?>