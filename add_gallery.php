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
            <h1>Add Gallery!</h1>
            <form action="add_gallery_action.php" method="post" enctype='multipart/form-data'> 
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
                    <input type="file" name="pictures[]" id="img-input" multiple="multiple" required>
                </div>
                <div>
                    <button type="submit" name="addgallery">Add Package</button>
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