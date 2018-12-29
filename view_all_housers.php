<?php include 'includes/config.php'; 
    if (isset($_GET['act'])) {
        $id = sanitizeData($_GET['id']);  
        $status = 'activated'; 
        $update_sql="UPDATE houser
        SET status='".$badge."' where id='".$id."'";
        mysqli_query($db,$update_sql);
        echo 'Successfully alloted the badge!';
        header('Location: view_all_housers.php');
        //header( "refresh:1;url=view_all_hostels.php" );
    }
    else if (isset($_GET['deact'])) {
        $id = sanitizeData($_GET['id']);   
        $status = 'de_activated';
        $update_sql="UPDATE houser 
        SET status='".$status."' where id='".$id."'";
        mysqli_query($db,$update_sql);
        echo 'Successfully removed the badge!';
        header('Location: view_all_housers.php');
        //header( "refresh:1;url=view_all_hostels.php" );

    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Hostel Tracker</title>
    <meta charset="utf-8">
    <script src="<?php echo $path ?>js/jquery-3.2.1.min.js"></script>
    <?php include 'includes/links.php'; ?>
    <style>
        /* 
        Generic Styling, for Desktops/Laptops 
        */
        table { 
        width: 100%; 
        border-collapse: collapse; 
        }
        /* Zebra striping */
        tr:nth-of-type(odd) { 
        background: #eee; 
        }
        th { 
        background: #333; 
        color: white; 
        font-weight: bold; 
        }
        td, th { 
        padding: 6px; 
        border: 1px solid #ccc; 
        text-align: left; 
        }

        @media only screen and (max-width: 760px),
        (min-width: 768px) and (max-width: 1024px)  {

            /* Force table to not be like tables anymore */
            table, thead, tbody, th, td, tr { 
                display: block; 
            }
            
            /* Hide table headers (but not display: none;, for accessibility) */
            thead tr { 
                position: absolute;
                top: -9999px;
                left: -9999px;
            }
            
            tr { border: 1px solid #ccc; }
            
            td { 
                /* Behave  like a "row" */
                border: none;
                border-bottom: 1px solid #eee; 
                position: relative;
                padding-left: 50%; 
            }
            
            td:before { 
                /* Now like a table header */
                position: absolute;
                /* Top/left values mimic padding */
                top: 6px;
                left: 6px;
                width: 45%; 
                padding-right: 10px; 
                white-space: nowrap;
            }
            td:nth-of-type(1):before { content: "Hostel Name"; }
            td:nth-of-type(2):before { content: "Hostel Type"; }
            td:nth-of-type(3):before { content: "Hostel City"; }
            td:nth-of-type(4):before { content: "Hostel Sector"; }
            td:nth-of-type(5):before { content: "Hostel Address"; }
        }
        .packbtn{

        }
        .featurebtn{

        }
        .packbtn:hover{
            color:red;
            cursor:pointer;
        }
        .featurebtn:hover{
            color:red;
            cursor:pointer;
        }
    </style>
</head>
<body>
    <?php
        //include "includes/header.php";
    ?>
    <div class="admin-form">
    <?php 
            if (isset($_SESSION['email'])) {
                ?>
            <h1>All Hostels Owners!</h1>  
                <div>
                    <?php 
                    $query = "SELECT * FROM houser";                    
                    $result = $db->query($query);
                    if (!empty($result)) {
                       ?>
                        <table>
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>City</th>
                                    <th>Address</th>
                                    
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                       <?php
                        while ($item = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                <td><?php echo $item['name'] ?></td>
                                
                                <td><?php echo $item['email'] ?></td>
                                
                                <td><?php echo $item['ph'] ?></td>
                                
                                <td><?php echo $item['city'] ?></td>
                                
                                <td><?php echo $item['address'] ?></td>
                                <td>
                                <form action="#" method="get">
                                <input type="hidden" name="id" value="<?php echo $item['id'] ?>">
                                <?php 
                                    if($item['status']=="de_activated")
                                    {
                                        ?><button type="submit" name="act">Activate</button>
                                       <?php
                                    }
                                    else
                                    {
                                       ?><button type="submit" name="deact">De-activate</button><?php
                                    }
                                ?>
                                </form>
                                </td>
                                </tr>
                                
                            <?php
                        }
                        ?>
                            </tbody>
                        </table>
                        <?php
                    }
                    ?>
                </div>
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