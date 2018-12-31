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
        header( "refresh:1;url=index.php" );           
    }
    $conn->close();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Hostel Tracker</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo $path ?>css/main.css">
    <link rel="stylesheet" href="<?php echo $path ?>css/jquery.rateyo.css" />
    <script src="<?php echo $path ?>js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo $path ?>js/jquery.rateyo.js"></script>
    <?php include 'includes/links.php'; ?>
</head>
<body>
   <?php include 'includes/header.php' ?>
    <!--   Main Content  -->
    <main class="main-container">
     
        <section class="main-container main-search-container">
            <div class="blur-layer">
                <div class="search-bar-container">
                    <form action="search.php" method="get">
                        <input class="big-search-bar" type="text" name="keyword" placeholder="Find the right hostel..." type="text">
                        <select name="type" id="">
                            <option value="city">By City</option>
                            <option value="name">By Name</option>
                        </select>
                        <button type="submit">Search!</button>
                    </form>
                </div>
            </div>
        </section>

        <div class="section-heading">
            <h2>
                Top Featured Hostels!
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
                    if($counter<6)
                    {
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
                            if(isset($_SESSION['email'])&&$_SESSION['role']=='user')
                            {?>
                                <button class="myBtn">Rate Now</button><?php
                            }
                        ?>
                        <a class="view-more-button" href="hostel.php?id=<?php echo $item['id']; ?>">View Details</a>
                    </div>
                <?php
                }
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
                <form action="" method="get">
                    <div class="rateHotel"></div>
                    <input type="submit" name="submitRating">
                </form>
            </div>
        </div>
    </main>
    <?php include 'includes/contact_form.php';
        include 'includes/footer.php';
    ?>
</body>
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

    // Get the modal
    var modal = document.getElementById('myModal');

    // Get the button that opens the modal
    //var btn = document.getElementByClassName("myBtn");
    $('.myBtn').click(function(){
       
        modal.style.display = "block";
    }); 
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];
    
    // When the user clicks the button, open the modal 
   

    // When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

</html>