<?php 
if (isset($_GET['status'])) {
    ?>
    <div>
        <?php 
        $hosel_id=$_GET['status'];
       $query = "SELECT * FROM packages where hostel_id='".$hosel_id."'";
       // $query = "SELECT * FROM packages";
       $db=mysqli_connect("localhost","root","","hosteltracker");
        $result = $db->query($query);
        if (!empty($result)) {
            ?>
            <table>
            <thead>
                <tr>
                    <th>Package Name</th>
                    <th>Package Price</th>
                    <th>Package Description</th>    
                </tr>
            </thead>
            <tbody>
            <?php 
            while ($item = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $item['pack_name'] ?></td>
                        
                        <td><?php echo $item['pack_price'] ?></td>
                        
                        <td><?php echo $item['pack_des'] ?></td>
                    </tr>
                <?php
            }
            ?>
                </tbody>
            </table>
            <?php 
    }
}
else
{
?>
<p>Not found!</p>
<?php
}