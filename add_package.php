<?php include 'includes/config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Hostel Tracker</title>
    <?php include 'includes/links.php'; ?>
</head>
<body>
    <div>
    <?php 
            if (isset($_SESSION['email'])) {
                ?>
            <div id="carea">
            <h1>Add Package!</h1>
            <div id="fields">
                <div class="sep"></div>
                <br>

                <form action="package_action.php.php" method="post">
                    <div>
                        <?php 
                            $member=getMemberId($_SESSION['email']);
                            $query = "SELECT * FROM hostels where owner_id='".$member."'";
                            $result = $db->query($query);
                            if (!empty($result)) {
                                ?>
                                <select name="hostel_id">
                                <?php
                                    while ($item = mysqli_fetch_assoc($result)) {?>
                                    <option value="<?php echo $item['id'] ?>"><?php echo $item['hostel_name'] ?></option>
                                    <?php } ?>               
                                </select><?php                         
                            }
                        ?>
                    </div>
                    <div>
                        <input type="hidden" name="id" value="<?php echo getMemberId($_SESSION['email']) ?>">
                    </div>
                    <div id="name_input">
                    <input type="text" name="pname" placeholder="Package name" required>
                    </div>
                    <div id="name_input">
                    <input type="number" min="0" name="pprice" placeholder="Package Price" required>
                    </div>
                    
                    <div id="name_input">
                    <textarea name="pdes" placeholder="enter package description.." required></textarea>
                    </div>
                    <div id="name_input">
                        <button type="submit" name="package_action">Add Package</button>
                    </div>
                </form>

            </div>
        </div>
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