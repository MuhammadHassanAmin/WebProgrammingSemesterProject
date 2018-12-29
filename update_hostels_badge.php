<?php include 'includes/config.php'; 
    if (isset($_GET['allot'])) {
        $id = sanitizeData($_GET['id']);  
        $badge = 1; 
        $update_sql="UPDATE hostels 
        SET badge='".$badge."' where id='".$id."'";
        mysqli_query($db,$update_sql);
        echo 'Successfully alloted the badge!';
        header( "refresh:1;url=view_all_hostels.php" );
    }
    else if (isset($_GET['remove'])) {
        $id = sanitizeData($_GET['id']);   
        $badge = 0;
        $update_sql="UPDATE hostels 
        SET badge='".$badge."' where id='".$id."'";
        mysqli_query($db,$update_sql);
        echo 'Successfully removed the badge!';
        header( "refresh:1;url=view_all_hostels.php" );
    }
?>