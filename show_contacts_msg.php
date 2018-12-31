<?php include 'includes/config.php'; 
?>
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
                                    <input type="submit" name="delete" value="Delete">
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