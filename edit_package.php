<?php include 'includes/config.php'; 
if (isset($_GET['updatep'])) {
    $name = sanitizeData($_GET['pname']);
    $price = sanitizeData($_GET['pprice']);
    $desc = sanitizeData($_GET['pdes']);
    $id = sanitizeData($_GET['id']);
    $update_sql="UPDATE packages 
    SET pack_name='".$name."',pack_price='".$price."',pack_des='".$desc."' where id='".$id."'";
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
    echo 'Successfully updated the package!';
   header( "refresh:2;url=dashboard.php" );
}
else if (isset($_GET['deletep'])) {
    $id = sanitizeData($_GET['id']);   
    $delete_sql="delete from packages where id='".$id."'";
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
    echo 'Successfully deleted the package!';
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
                $sql="select * from packages where id='".$_GET['id']."';";
                $result = mysqli_query($db,$sql);
                $product_array = mysqli_fetch_assoc($result);
                ?>
            <h1>Add Package!</h1>
            <form action="#" method="get"> 
                 <div>
                    <input type="hidden" name="id" value="<?php echo $product_array['id'] ?>" required>
                </div>
                <div>
                    <input type="text" name="pname" value="<?php echo $product_array['pack_name'] ?>" required>
                </div>
                <div>
                    <input type="number" min="0" name="pprice" value="<?php echo $product_array['pack_price'] ?>" required>
                </div>
              
                <div>
                    <textarea name="pdes" required><?php echo $product_array['pack_des'] ?></textarea>
                </div>
                <div>
                    <button type="submit" name="updatep">Update Package</button>
                    <button type="submit" name="deletep">Delete Package</button>
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