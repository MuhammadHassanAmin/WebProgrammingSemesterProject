<?php include 'includes/config.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Hostel Tracker</title>
    <meta charset="utf-8">
    <?php include 'includes/links.php'; ?>

</head>

<body>
    <div>
        <?php 
            if (isset($_SESSION['email'])) {
                ?>
        <div id="carea">
            <h1>Add Hostel!</h1>
            <div id="fields">
                <div class="sep"></div>
                <br>

                <form action="add_hostel_action.php" method="post">
                    <div>
                        <input type="hidden" name="id" value="<?php echo getMemberId($_SESSION['email']) ?>">
                    </div>
                    <div id="name_input">
                        <input type="text" name="hname" placeholder="Hostel name" required>
                    </div>
                    <div id="name_input">
                        <input type="text" name="htype" placeholder="Hostel Type" required>
                    </div>
                    <div id="name_input">
                        <input type="text" name="hcity" placeholder="City" required>
                    </div>
                    <div id="name_input">
                        <input type="text" name="hsector" placeholder="Sector" required>
                    </div>
                    <div id="name_input">
                        <textarea name="haddress" placeholder="Enter Your Address.."></textarea>
                    </div>
                    <div> 
                        <label for="">Select Hostel Cover</label><br>
                        <input type="file" name="profile">
                    </div>
                    <div>
                        <button type="submit" name="hostel_action">Add Hostel</button>
                    </div>
                </form>

            </div>
        </div>
        
        <?php 
            }
            else
            {
                ?>
        <p>Not Logged In!</p>
        <?php 
            }
        ?>

    </div>
</body>

</html>