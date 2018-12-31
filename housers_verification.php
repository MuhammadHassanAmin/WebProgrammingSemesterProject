<?php include 'includes/config.php'; 
    if (isset($_GET['act'])) {
        $id = sanitizeData($_GET['id']);  
        $status = 'activated'; 
        $update_sql="UPDATE houser
        SET status='".$status."' where id='".$id."'";
        mysqli_query($db,$update_sql);
        echo 'Successfully alloted the badge!';
        header( "refresh:1;url=admindashboard.php" );
    }
    else if (isset($_GET['deact'])) {
        $id = sanitizeData($_GET['id']);     
        $status = 'de_activated';
        $update_sql="UPDATE houser 
        SET status='".$status."' where id='".$id."'";
        mysqli_query($db,$update_sql);
        echo 'Successfully removed the badge!';
        header( "refresh:1;url=admindashboard.php" );
    }
    else
    {
        header( "refresh:0;url=admindashboard.php" );     
    }
?>