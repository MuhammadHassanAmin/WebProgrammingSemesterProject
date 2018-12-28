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
    <?php 
            if (isset($_SESSION['email'])) {
                ?>
            <h1>Add Hostel!</h1>
            <form action="add_hostel_action.php" method="post"> 
                <div>
                    <input type="hidden" name="id" value="<?php echo getMemberId($_SESSION['email']) ?>">
                </div>
                <div>
                    <input type="text" name="hname" placeholder="hostel name">
                </div>
                <div>
                    <input type="text" name="htype" placeholder="Hostel Type">
                </div>
                
                <div>
                    <input type="text" name="hcity" placeholder="City">
                </div>
                <div>
                    <input type="text" name="hsector" placeholder="Sector">
                </div>
                <div>
                    <textarea name="haddress" placeholder="enter your address.."></textarea>
                </div>
                <div>
                    <button type="submit" name="hostel_action">Add Hostel</button>
                </div>
            </form> 
        <?php 
            }
            else
            {
                ?><p>Not Logged In!</p><?php 
            }
        ?>

    </div>
</body>
</html>