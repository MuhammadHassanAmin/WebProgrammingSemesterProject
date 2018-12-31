<?php include 'includes/config.php';  ?>
<?php 
if (isset($_GET['submitRating'])) {
    $rating = $_COOKIE['rating'];
    $hostel_id =1;
    $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
    if ($conn->connect_error) {
    trigger_error('Database connection failed: ' .
    $conn->connect_error, E_USER_ERROR);
    }else{
        $sql="INSERT INTO rating(hostel_id,rating) values ('$hostel_id','$rating')";
        if($conn->query($sql) === false) {
        trigger_error('Wrong SQL: ' . $sql .
        ' Error: ' . $conn->error, E_USER_ERROR);
        } else {
        echo "Rating done successfully<br />";
        header( "refresh:1;url=main.php" );
    /* echo "Last Inserted ID: " . $conn->insert_id . "<br />";
        echo "Affected Rows: " . $conn->affected_rows . "<br />";*/           
    }
    $conn->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Hostel Tracker</title>    
    <link rel="stylesheet" href="<?php echo $path ?>css/jquery.rateyo.css" />
    <script src="<?php echo $path ?>js/jquery.rateyo.js"></script>
    <link rel="icon" href="<?php echo $path ?>graphics/icon.png" type="image/png" sizes="16x16">
    <?php include 'includes/links.php'; ?>
</head>
<body>
   <?php include 'includes/header.php' ?>
    <main class="main-container">
        <div class="section-heading">
            <h2>
                Featured Hostels
            </h2>
        </div>
        <section class="featured-hostels">
        <?php 
             $query = "SELECT * FROM hostels";
             $result = $db->query($query);
             $counter = 0;
             $image ="";
             if (!empty($result)) {
                while ($item = mysqli_fetch_assoc($result)) { 
                    $counter++;
                ?>
                    <div class="featured-hostel-box">
                    <?php 
                        if($counter%2==0)
                        {
                            $image = './graphics/hostelpic1.jpg';
                        }
                        else if($counter%3==0)
                        {
                            $image = './graphics/hostelpic2.jpg';
                        }
                        else if($counter%5==0)
                        {
                            $image = './graphics/hostelpic5.jpg';
                        }
                        else
                        {
                            $image = './graphics/hostelpic3.jpg';
                        }
                    ?>
                        <img class="hostel-feature-image" src="<?php echo $image; ?>" alt="">
                        <h3><?php echo $item['hostel_name'] ?></h3>
                        <p><?php echo $item['hostel_type'] ?> Hostel</p>
                        <p><?php echo $item['hostel_address'] ?></p>
                        <div class="rateYo"></div>
                        <?php 
                            if(isset($_SESSION['email']))
                            {?>
                                <button class="myBtn">Rate Now</button><?php
                            }
                        ?>
                        <a class="view-more-button" href="hostel.php?id=<?php echo $item['id']; ?>">View Details</a>
                    </div>
                <?php
                }
            }
            ?>
        </section>
         <!-- The Modal -->
         <div id="myModal" class="modal">
            <!-- Modal content -->
            <div class="modal-content">
                <span class="close">&times;</span>
                <h1>Hostel Rating</h1>
                <form  method="get">
                    <div class="rateHotel"></div>
                    <input type="text" name="id" value="val()">
                    <input type="submit" name="submitRating">
                </form>
            </div>
        </div>
    </main>
    <?php
        include 'includes/footer.php';
    ?>
    <script>
    $(function () {

        $(".rateYo").rateYo({
            rating: 3.8,
            readOnly: true
        });
        $(".rateHotel").rateYo({
            rating: 3.8,
        });

        $(".rateHotel").rateYo()
            .on("rateyo.set", function (e, data) {
                setCookie("rating", data.rating, 1);
            });

        function setCookie(cname, cvalue, exdays) {
            var d = new Date();
            d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
            var expires = "expires=" + d.toUTCString();
            document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
        }
    });

    var modal = document.getElementById('myModal');

    $('.myBtn').click(function(){
        modal.style.display = "block";
    });
    function val()
    {
        return  $('input[name="idd"]').val();
    }
    var span = document.getElementsByClassName("close")[0];

    span.onclick = function () {
        modal.style.display = "none";
    }

    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
</body>
</html>
