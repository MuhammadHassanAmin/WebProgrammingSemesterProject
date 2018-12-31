<?php include_once 'includes/config.php';  ?>
<br><br><br>
<div class="admin-form">
<?php 
        if (isset($_SESSION['email'])) {
            ?>
        <h1>View all Hostels!</h1>  
            <div id="vh">
                <?php 
                $member=getMemberId($_SESSION['email']);
                $query = "SELECT * FROM hostels where owner_id='".$member."'";                    
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
                                <th></th>
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
                                <button value="<?php echo $item['id'] ?>" class="pks">View Packages</button>
                            </td>
                            <td >
                                <button value="<?php echo $item['id'] ?>" class="fks">View Features</button>
                            </td>
                            <td>
                                <a href="edit_hostel.php?id=<?php echo $item['id'] ?>">Edit</a>
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
            <div id="pfdata">
                <?php include 'view_packages.php' ?>
            </div>
    <?php 
        }
        else
        {
            ?><p>Not Logged In!</p><?php 
        }
    ?>

</div>
<script>
    $(document).ready(function(){       
       $('.pks').click(function(){
           $('#pfdata').load('view_packages.php','status='+$(this).val());
           $('#pfdata').html("<img src='graphics/loading.gif' alt='Loading Packages...'>");
       });
       
       $('.fks').click(function(){
           $('#pfdata').load('view_features.php','status1='+$(this).val());
           $('#pfdata').html("<img src='graphics/loading.gif' alt='Loading Packages...'>");
       });
    });
</script>