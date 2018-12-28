 <?php include 'includes/config.php'; 
if (isset($_GET['status1'])) {
    ?>
    <div>
        <?php 
        $hosel_id=$_GET['status1'];
        $query = "SELECT * FROM features where hostel_id='".$hosel_id."'";
        $result = $db->query($query);
        if (!empty($result)) {
            ?>
            <table>
            <thead>
                <tr>
                    <th>Feature Name</th>
                    <th>Feature Description</th>    
                </tr>
            </thead>
            <tbody>
            <?php
            while ($item = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $item['feature_name'] ?></td>
                        
                        <td><?php echo $item['feature_des'] ?></td>
                    </tr>
                <?php
            }
            ?>
                </tbody>
            </table>
            <?php
    }

}