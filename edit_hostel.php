<?php include 'includes/config.php';
if (isset($_GET['updateh'])) {
    $name = sanitizeData($_GET['hname']);
    $type = sanitizeData($_GET['htype']);
    $city = sanitizeData($_GET['hcity']);
    $sector = sanitizeData($_GET['hsector']);
    $address = sanitizeData($_GET['haddress']);
    $id = sanitizeData($_GET['id']);
    $update_sql="UPDATE hostels 
    SET hostel_name='".$name."',hostel_type='".$type."',hostel_city='".$city."',hostel_sector='".$sector."',hostel_address='".$address."' where id=".$id."";
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
    echo 'Successfully updated the hostel!';
    header( "refresh:2;url=dashboard.php" );
}
else if (isset($_GET['deleteh'])) {
    $id = sanitizeData($_GET['id']);   
    ?>
        <script>
            alert('By deleting the hostel, all the packages and features associated will also delete!');
        </script>
    <?php
    $delete_sql="delete from features where hostel_id='".$id."'";
    $delete_sql="delete from packages where hostel_id='".$id."'";
    $delete_sql="delete from hostels where id='".$id."'";
    $db->query($delete_sql);
    ?>
        <style>
            header{
                display:none;
            }
            .admin-form{
                display:none;
            }
        </style>
    <?php
    echo 'Successfully deleted the hostel!';
    header( "refresh:2;url=view_hostels.php" );
}
?>
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
            if (isset($_GET['id'])) {
                $sql="select * from hostels where id='".$_GET['id']."';";
                $result = mysqli_query($db,$sql);
                $product_array = mysqli_fetch_assoc($result);
                ?>
            <h1>Edit Hostel!</h1>
            <form action="#" method="get"> 
                <div>
                    <input type="hidden" name="id" value="<?php echo $product_array['id'] ?>" required>
                </div>
                <div>
                    <input type="text" name="hname" value="<?php echo $product_array['hostel_name'] ?>" required>
                </div>
                <div>
                    <input type="text" name="htype" value="<?php echo $product_array['hostel_type'] ?>" required>
                </div>
                
                <div>
                    <input type="text" name="hcity" value="<?php echo $product_array['hostel_city'] ?>" required>
                </div>
                <div>
                    <input type="text" name="hsector" value="<?php echo $product_array['hostel_sector'] ?>" required>
                </div>
                <div>
                    <textarea name="haddress" required><?php echo $product_array['hostel_address'] ?></textarea>
                </div>
                <div>
                    <button type="submit" name="updateh">Update Hostel</button>
                </div>
                <div>
                    <button type="submit" name="deleteh">Delete Hostel</button>
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