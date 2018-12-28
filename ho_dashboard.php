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
            ?><div id="hoprofile"><?php
            if (!isset($_SESSION['upic'])) {
                ?>
                <p>You have profile pricture!</p>
                    <?php 
                }
                else
                {
                    ?>
                        <p>You have no profile picture.</p>
                    <?php
                }
            ?></div><?php
        ?>
    </div>
</body>
</html>