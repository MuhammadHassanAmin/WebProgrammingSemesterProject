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
        <h1>Dashboard</h1>
        <?php 
            if (isset($_SESSION['email'])) {
                ?>
                    <p>Welcome User! <?php echo $_SESSION['uname'] ?></p>
                <?php 
            }
            
        ?>
        <a href="add_hostel.php">Add Hostel</a><br>
        <a href="add_package.php">Add Package</a><br>
        <a href="add_feature.php">Add Feature</a><br>
        <a href="view_hostels.php">View Hostels</a><br>
        <a href="add_gallery.php">Add Gallery</a><br>
    </div>
</body>
</html>