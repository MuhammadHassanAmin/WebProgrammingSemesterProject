<?php
include 'includes/config.php';

if (isset($_POST['addgallery'])) {
    $hostel_id = $_POST['hostel_id'];
    $fileCount = count($_FILES['pictures']['name']);
    $sql="select * from gallery where hostel_id='".$hostel_id."';";
    $result = mysqli_query($db,$sql);
    $num_rows = mysqli_num_rows($result);
    if($fileCount+$num_rows>15)
    {
        echo 'You cannot select more than 15 images to one hostel!';
        header( "refresh:2;url=dashboard.php" );
    }
    else
    {
        $hostel_id = $_POST['hostel_id'];
        for($i=0;$i<$fileCount;$i++){
        
        if ((($_FILES["pictures"]["type"][$i] == "image/gif") || ($_FILES["pictures"]["type"][$i] == "image/jpeg") || ($_FILES["pictures"]["type"][$i] == "image/pjpeg")|| ($_FILES["pictures"]["type"][$i] == "image/png"))
            && ($_FILES["pictures"]["size"][$i] < 1000000))
            {
            if ($_FILES["pictures"]["error"][$i] > 0)
            {
                echo "Return Code: " . $_FILES["pictures"]["error"][$i] . "<br />";
            }
            else
            {
                $picture = $_FILES["pictures"]["name"][$i];
            
                if (file_exists("graphics/" . $_FILES["pictures"]["name"][$i]))
                    {
                        echo $_FILES["pictures"]["name"][$i] . " already exists. ";
                    }
                else
                    {
                        move_uploaded_file($_FILES["pictures"]["tmp_name"][$i],
                        "graphics/" . $_FILES["pictures"]["name"][$i]);
                        $picture = $_FILES["pictures"]["name"][$i];
                        $ext = pathinfo($picture, PATHINFO_EXTENSION);
                        $save_picture = 'image'.microtime().'.'.$ext;
                        rename('graphics/'.$picture,'graphics/'.$save_picture);
                        $sql="INSERT INTO gallery (hostel_id,picture) 
                        Values('$hostel_id','$save_picture')";
                        mysqli_query($db,$sql);                   
                    }
            }
            }
        else
            {
                echo "Invalid file";
            }
        }
        echo "Gallery added successfully<br />";
    }
   
    header( "refresh:2;url=ho_dashboard.php" );
}
else
{
    echo 'error';
}