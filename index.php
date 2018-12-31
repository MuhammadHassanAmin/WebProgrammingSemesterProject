<?php include 'includes/config.php'; 

if (isset($_GET['submitRating'])) {
    $rating = $_COOKIE['rating'];
    $hostel_id =$_COOKIE['hid'];
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
<html lang="en">
<head>
    <title>Hostel Tracker</title>
    <?php include 'includes/links.php';?>
    <link rel="stylesheet" href="<?php echo $path ?>css/jquery.rateyo.css" />
    <script src="<?php echo $path ?>js/jquery.rateyo.js"></script>
</head>
<body>
   <?php include 'includes/header.php' ?>
    <!--   Main Content  -->
    <main class="main-container">
     
        <div class="main-container main-search-container">
            <div class="blur-layer">
                <div class="search-bar-container">
                    <form action="search.php" method="get">
                        <input class="big-search-bar" type="text" name="keyword" placeholder="Find the right hostel..." >
                        <select name="type">
                            <option value="city">By City</option>
                            <option value="name">By Name</option>
                        </select>
                        <button type="submit">Search!</button>
                    </form>
                </div>
            </div>
        </div>

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
                                <button class="myBtn" value="<?php echo $item['id']; ?>">Rate Now</button><?php
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
</html>
<script>
    $(document).ready(function () {
        $(".rateYo:even").rateYo({
            rating: 4.8,
            readOnly: true
        });
        $(".rateYo:odd").rateYo({
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
    });

    var modal = document.getElementById('myModal');

    $('.myBtn').click(function(){
        setCookie('hid',$(this).val(),1);
        modal.style.display = "block";
    }); 

    var span = document.getElementsByClassName("close")[0];
    
    span.onclick = function () {
        modal.style.display = "none";
    }

    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }
</script>