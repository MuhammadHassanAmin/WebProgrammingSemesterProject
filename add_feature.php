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
            <h1>Add Feature!</h1>
            <form action="feature_action.php" method="post"> 
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
                    <input type="text" name="fname" placeholder="Feature name">
                </div>
                <div>
                    <textarea name="fdes" placeholder="enter feature description.."></textarea>
                </div>
                
                <div>
                    <button type="submit" name="feature_action">Add Feature</button>
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