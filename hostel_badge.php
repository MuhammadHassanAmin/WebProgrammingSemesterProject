<?php include 'includes/config.php'; 
    if (isset($_GET['allot'])) {
        $id = sanitizeData($_GET['id']);  
        $update_sql="UPDATE hostels 
        SET badge='1' where id='".$id."'";
        mysqli_query($db,$update_sql);
        header( "refresh:1;url=admindashboard.php" );
    }
    else if (isset($_GET['remove'])) {
        $id = sanitizeData($_GET['id']);   
        $update_sql="UPDATE hostels 
        SET badge='0' where id='".$id."'";
        mysqli_query($db,$update_sql);
        echo 'Successfully removed the badge!';
        header( "refresh:1;url=admindashboard.php" );
    }
    else
    {
        header( "refresh:0;url=admindashboard.php" );
    }
?>