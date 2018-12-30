<?php include 'includes/config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Hostel Tracker</title>
    <meta charset="utf-8">
    <?php include 'includes/links.php'; ?>
</head>
<body>
    <div class="admin-form">
    <?php 
            if (isset($_SESSION['email'])) {
                ?>
            <h1>Add Package!</h1>
            <form action="package_action.php" method="post"> 
                <div>
                    <input type="text" name="pname" placeholder="Package name">
                </div>
                <div>
                    <input type="number" min="0" name="pprice" placeholder="Package Price">
                </div>
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
                    <textarea name="pdes" placeholder="enter package description.."></textarea>
                </div>
                <div>
                    <button type="submit" name="package_action">Add Package</button>
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