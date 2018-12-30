<?php include 'includes/config.php';  ?>
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
        input{
            display:none;
        }
    </style>
</head>
<body>
    <div class="admin-form">
    <?php 
            if (isset($_GET['keyword'])) {
                $query = "";
                if($_GET['type']=='city')
                {
                    $query = "SELECT * FROM hostels where hostel_city like '%".$_GET['keyword']."%'";                   
                }
                else if($_GET['type']=='name')
                {
                    $query = "SELECT * FROM hostels where hostel_name like '%".$_GET['keyword']."%'";                    
                }
                ?>
                <h1>Search Results!</h1>  
                <div>
                    <?php 
                    $result = $db->query($query);
                    if (!empty($result)) {
                       ?>
                        <table>
                            <thead>
                                <tr>
                                    <th>Hostel Name</th>
                                    <th>Hostel Type</th>
                                    <th>Hostel City</th>
                                    <th>Hostel Sector</th>
                                    <th>Hostel Address</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                       <?php
                        while ($item = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                <td><?php echo $item['hostel_name'] ?></td>
                                
                                <td><?php echo $item['hostel_type'] ?></td>
                                
                                <td><?php echo $item['hostel_city'] ?></td>
                                
                                <td><?php echo $item['hostel_sector'] ?></td>
                                
                                <td><?php echo $item['hostel_address'] ?></td>
                                <td>
                                   <a href="hostel.php?id=<?php echo $item['id'] ?>">View Details</a>
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