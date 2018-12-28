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
        <h1>Admin Login</h1>
        <form action="authentication.php" method="post"> 
            <div>
                <input type="text" name="email" placeholder="user name">
            </div>
            <div>
                <input type="password" name="pass" placeholder="*******">
            </div>
            <div>
                <button type="submit" name="submit">Login</button>
            </div>
        </form> 
    </div>
</body>
</html>