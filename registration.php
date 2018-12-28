<?php include 'includes/config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Hostel Tracker</title>
    <meta charset="utf-8">
    <?php include 'includes/links.php'; ?>
</head>
<body>
    <?php
        include "includes/header.php";
    ?>
    <div class="admin-form">
        <h1>Hostel Owner Registration!</h1>
        <form action="registration-action.php" method="post"> 
            <div>
                <input type="text" name="username" placeholder="user name">
            </div>
            <div>
                <input type="text" name="email" placeholder="email">
            </div>
            
            <div>
                <input type="text" name="ph" placeholder="Phone Number">
            </div>
            <div>
                <input type="text" name="city" placeholder="City">
            </div>
            <div>
                <textarea name="address" placeholder="enter your address.."></textarea>
            </div>
            <div>
                <button type="submit" name="registration_action">Login</button>
            </div>
        </form> 
    </div>
</body>
</html>