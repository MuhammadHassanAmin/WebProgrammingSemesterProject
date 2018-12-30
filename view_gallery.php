<?php
if (isset($_GET['status2'])&&isset($_GET['mod'])) {
    ?>
    <div class="gallery">
        <h1>Gallery!</h1>
        <?php 
        $hosel_id=$_GET['status2'];
        $db=mysqli_connect("localhost","root","","hosteltracker");
        $query = "SELECT * FROM gallery where hostel_id='".$hosel_id."'";
        $result = $db->query($query);
        if (!empty($result)) {
            ?>
            <?php
            while ($item = mysqli_fetch_assoc($result)) {
                ?>
                   <img src="<?php echo 'graphics/'.$item['picture'] ?>" alt="No Picture">
                <?php
            }
        }
        sleep(2);
    ?></div>
    <?php
}
else if (isset($_GET['status2'])&&(!isset($_GET['mod']))) {
    ?>
    <div class="gallery">
        <?php 
        $hosel_id=$_GET['status2'];
        $db=mysqli_connect("localhost","root","","hosteltracker");
        $query = "SELECT * FROM gallery where hostel_id='".$hosel_id."'";
        $result = $db->query($query);
        if (!empty($result)) {
            ?>
            <?php
            while ($item = mysqli_fetch_assoc($result)) {
                ?>
                   <img src="<?php echo 'graphics/'.$item['picture'] ?>" alt="No Picture">
                <?php
            }
         }
    ?></div>
    <?php
}
else
{
    echo 'Not found!';
}?>
