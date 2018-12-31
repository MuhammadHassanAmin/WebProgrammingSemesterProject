<?php include 'includes/config.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Hostel Tracker</title>
    <meta charset="utf-8">
    <?php include 'includes/links.php'; ?>
</head>

<body>
    <div id="carea">
    <h1>Add Gallery!</h1>
        <div id="fields">
            <div class="sep"></div>
            <br>
            <div class="admin-form">
                <?php 
            if (isset($_SESSION['email'])) {
                ?>
                
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
                            <option value="<?php echo $item['id'] ?>">
                                <?php echo $item['hostel_name'] ?>
                            </option>
                            <?php } ?>
                        </select>
                        <?php                         
                        }
                    ?>
                    </div>
                    <div id="name_input">
                        <input type="file" name="userfile[]" id="img-input" multiple="multiple" required>
                    </div>
                    <div id="name_input">
                        <button type="submit" name="addgallery">Add Package</button>
                    </div>
                </form>
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
            <div>
                <div>
</body>

</html>