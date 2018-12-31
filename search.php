<?php include 'includes/config.php';  ?>
<!DOCTYPE html>
<html>
<head>
    <title>Hostel Tracker</title>
    <meta charset="utf-8">
    <script src="<?php echo $path ?>js/jquery-3.2.1.min.js"></script>
    <?php include 'includes/links.php'; ?>
</head>
<body>
    <?php include 'includes/header.php'; ?>
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