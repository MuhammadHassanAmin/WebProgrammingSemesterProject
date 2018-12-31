<?php include 'includes/config.php'; 
    if (isset($_GET['updatef'])) {
        $name = sanitizeData($_GET['fname']);
        $desc = sanitizeData($_GET['fdes']);
        $id = sanitizeData($_GET['id']);   
        $update_sql="UPDATE features 
        SET feature_name='".$name."',feature_des='".$desc."' where id='".$id."'";
        mysqli_query($db,$update_sql);
        ?>
        <style>
            .admin-form{
                display:none;
            }
            header{
                display:none;
            }
        </style>
        <?php
        echo 'Successfully updated the feature!';
        header( "refresh:2;url=dashboard.php" );
    }
    else if (isset($_GET['deletef'])) {
        $id = sanitizeData($_GET['id']);   
        $delete_sql="delete from features where id='".$id."'";
        $db->query($delete_sql);
        ?>
        <style>
            .admin-form{
                display:none;
            }
            header{
                display:none;
            }
        </style>
        <?php
        echo 'Successfully deleted the feature!';
        header( "refresh:2;url=dashboard.php" );
    }
?>
<!DOCTYPE html>
<html lang="en">
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
                $sql="select * from features where id='".$_GET['id']."';";
                $result = mysqli_query($db,$sql);
                $product_array = mysqli_fetch_assoc($result);
                ?>
            <h1>Add Feature!</h1>
            <form action="#" method="get">
                <div>
                    <input type="hidden" name="id" value="<?php echo $product_array['id'] ?>" required>
                </div>
                <div>
                    <input type="text" name="fname" value="<?php echo $product_array['feature_name'] ?>" required>
                </div>
                <div>
                    <textarea name="fdes" required><?php echo $product_array['feature_des'] ?></textarea>
                </div>
                
                <div>
                    <button type="submit" name="updatef">Update Feature</button>
                    <button type="submit" name="deletef">Delete Feature</button>
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