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
        <form action="registration-action.php" method="post" enctype="multipart/form-data"> 
            <div>
                <input type="text" name="username" placeholder="user name" required>
            </div>
            <div>
                <input type="text" name="email" placeholder="email" required>
            </div>
            
            <div>
                <input type="text" name="ph" placeholder="Phone Number" required>
            </div>
            <div>
                <input type="text" name="city" placeholder="City" required>
            </div>
            <div>
                <textarea name="address" placeholder="enter your address.." required></textarea>
            </div>
            <div>
            <label for="">Select Profile Picture</label>
                <input type="file" name="profile">
            </div>
            <div>
                <button type="submit" name="registration_action">Register</button>
            </div>
        </form> 
    </div>
</body>
</html>