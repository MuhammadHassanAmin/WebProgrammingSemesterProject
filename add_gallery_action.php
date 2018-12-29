<?php
include 'includes/config.php';

if (isset($_POST['addgallery'])) {
    //the path to store the uploaded image
   // $target="prod_img/".basename($_FILES['product_image']['name']);
    $hostel_id = $_POST['hostel_id'];
    $fileCount = count($_FILES['userfile']['name']);
    $sql="select * from gallery where hostel_id='".$hostel_id."';";
    $result = mysqli_query($db,$sql);
    $num_rows = mysqli_num_rows($result);
    if($fileCount+$num_rows>15)
    {
        echo 'You cannot select more than 15 images to one hostel!';
        header( "refresh:2;url=ho_dashboard.php" );
    }
    else
    {
        $hostel_id = $_POST['hostel_id'];
        for($i=0;$i<$fileCount;$i++){
        
        if ((($_FILES["userfile"]["type"][$i] == "image/gif") || ($_FILES["userfile"]["type"][$i] == "image/jpeg") || ($_FILES["userfile"]["type"][$i] == "image/pjpeg")|| ($_FILES["userfile"]["type"][$i] == "image/png"))
            && ($_FILES["userfile"]["size"][$i] < 1000000))
            {
            if ($_FILES["userfile"]["error"][$i] > 0)
            {
                echo "Return Code: " . $_FILES["userfile"]["error"][$i] . "<br />";
            }
            else
            {
                $picture = $_FILES["userfile"]["name"][$i];
            
                /*echo "Upload: " . $_FILES["userfile"]["name"][$i] . "<br />";
                echo "Type: " . $_FILES["userfile"]["type"][$i] . "<br />";
                echo "Size: " . ($_FILES["userfile"]["size"][$i] / 1024) . " Kb<br />";
                echo "Temp file: " . $_FILES["userfile"]["tmp_name"][$i] . "<br />";*/
        
                if (file_exists("junk/" . $_FILES["userfile"]["name"][$i]))
                    {
                        echo $_FILES["userfile"]["name"][$i] . " already exists. ";
                    }
                else
                    {
                        move_uploaded_file($_FILES["userfile"]["tmp_name"][$i],
                        "junk/" . $_FILES["userfile"]["name"][$i]);
                        $picture = $_FILES["userfile"]["name"][$i];
                        $ext = pathinfo($picture, PATHINFO_EXTENSION);
                        $save_picture = 'image'.microtime().'.'.$ext;
                        rename('junk/'.$picture,'junk/'.$save_picture);
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