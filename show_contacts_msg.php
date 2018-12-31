<?php include 'includes/config.php'; 
    if (isset($_GET['delete'])) {
        $id = sanitizeData($_GET['id']);  
        $status = 'activated'; 
        $delete_sql="delete from contact where id='".$id."'";
        $db->query($delete_sql);
        header('Location: show_contacts_msg.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Hostel Tracker</title>
    <meta charset="utf-8">
    <script src="<?php echo $path ?>js/jquery-3.2.1.min.js"></script>
    <?php include 'includes/links.php'; ?>
</head>
<body>
    <div class="admin-form">
    <?php 
            if (isset($_SESSION['email'])) {
                ?>
            <h1>View all Contact Messgaes!</h1>  
                <div id="msg">
                    <?php 
                    $query = "SELECT * FROM contact";                    
                    $result = $db->query($query);
                    if (!empty($result)) {
                       ?>
                        <table>
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Message</th>
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
                                
                                <td><?php echo $item['subject'] ?></td>
                                
                                <td><?php echo $item['msg'] ?></td>
                              
                                <td>
                                <form action="#" method="get">
                                <input type="hidden" name="id" value="<?php echo $item['id'] ?>"> 
                                    <button type="submit" name="delete">Delete</button>
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