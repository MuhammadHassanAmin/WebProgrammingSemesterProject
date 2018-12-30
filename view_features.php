 <?php 
if (isset($_GET['status1'])&&isset($_GET['mod'])) {
    ?>
    <div>
        <?php 
        sleep(1);
        $hosel_id=$_GET['status1'];
        $db=mysqli_connect("localhost","root","","hosteltracker");
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
else if (isset($_GET['status1'])&&!(isset($_GET['mod']))) {
    ?>
    <div>
        <?php 
        $hosel_id=$_GET['status1'];
        $db=mysqli_connect("localhost","root","","hosteltracker");
        $query = "SELECT * FROM features where hostel_id='".$hosel_id."'";
        $result = $db->query($query);
        if (!empty($result)) {
            ?>
            <table>
            <thead>
                <tr>
                    <th>Feature Name</th>
                    <th>Feature Description</th>  
                    <th></th>  
                </tr>
            </thead>
            <tbody>
            <?php
            while ($item = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $item['feature_name'] ?></td>
                        
                        <td><?php echo $item['feature_des'] ?></td>
                        <td>
                            <a href="edit_feature.php?id=<?php echo $item['id'] ?>">Edit</a>
                        </td>
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
    echo 'Not Found!';
}