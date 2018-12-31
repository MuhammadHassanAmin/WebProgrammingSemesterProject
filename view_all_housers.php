<?php include 'includes/config.php'; 
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
                                <form action="housers_verification.php" method="get">
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