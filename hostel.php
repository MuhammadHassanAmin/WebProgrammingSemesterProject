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
            if (isset($_GET['id'])) {
                ?>
            <h1>Hostel Details!</h1>  
                <div>
                    <?php 
                    $id=$_GET['id'];
                    $query = "SELECT * FROM hostels where id='".$id."'";                    
                    $result = $db->query($query);
                    if (!empty($result)) {
                        while ($item = mysqli_fetch_assoc($result)) {
                            ?>
                            <ul>
                                <li>Hostel: <?php echo $item['hostel_name'] ?></li>
                                
                                <li>Type: <?php echo $item['hostel_type'] ?></li>
                                
                                <li>City: <?php echo $item['hostel_city'] ?></li>
                                
                                <li>Sector: <?php echo $item['hostel_sector'] ?></li>
                                
                                <li>Address: <?php echo $item['hostel_address'] ?></li>
                               
                                    <input type="hidden" id="pb" name="status" value="<?php echo $item['id'] ?>">
                            </ul>                                
                            <?php
                        }
                    }
                    ?>
                </div>
                <div id="packages">
                    <?php include 'view_packages.php' ?>
                </div>
                <div id="features">
                    <?php include 'view_features.php' ?>
                </div>
                <div id="gallery">
                    <?php include 'view_gallery.php' ?>
                </div>
        <?php 
            }
            else
            {
                ?><p>Not Logged In!</p><?php 
            }
        ?>
    </div>
    <?php include 'includes/footer.php' ?>
</body>
</html> 
<script>
    $(document).ready(function(){
        $('#packages').load('view_packages.php','status='+$('input[name=status]').val()+'&mod=view');
        $('#packages').html("<img src='graphics/loading.gif' alt='Loading Packages...'>");
        $('#features').load('view_features.php','status1='+$('input[name=status]').val()+'&mod=view');
        $('#features').html("<img src='graphics/loading.gif' alt='Loading Packages...'>");
        $('#gallery').load('view_gallery.php','status2='+$('input[name=status]').val()+'&mod=view');
        $('#gallery').html("<img src='graphics/loading.gif' alt='Loading Pictures...'>");
    }); 
</script>
