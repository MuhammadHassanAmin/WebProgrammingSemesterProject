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
    <link rel="icon" href="<?php echo $path ?>graphics/icon.png" type="image/png" sizes="16x16">

    <!--[if lt IE 9]>
	    <script src="/js/respond.min.js"></script>
	    <script src="/js/html5shiv-printshiv.js"></script>
	<![endif]-->
    <style>
        /* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>
</head>

<body>
    <div class="header-top">
        <div class="social-links-top-header">
            <a href="">
                <img src="./graphics/facebook.png" alt="">
            </a>
            <a href="">
                <img src="./graphics/twitter.png" alt="">
            </a>
            <a href="">
                <img src="./graphics/youtube.png" alt="">
            </a>
            <a href="">
                <img src="./graphics/instagram.png" alt="">
            </a>
        </div>
    </div>
    <header class="header">
        <div class="container">

            <!-- Header Logo -->
        
            <div class="nav">
                <div class="nav-header">
                    <div class="nav-title">
                    <div class="header__logo">
                <img src="./graphics/logo.png" alt="logo">
            </div>
                    </div>
                </div>
                <div class="nav-btn">
                    <label for="nav-check">
                        <span></span>
                        <span></span>
                        <span></span>
                    </label>
                </div>
                <input type="checkbox" id="nav-check">
                <div class="nav-links">
                    <a href="//github.io/jo_geek" target="_blank">About</a>
                    <a href="http://stackoverflow.com/users/4084003/" target="_blank">Contact</a>
                    <a href="https://in.linkedin.com/in/jonesvinothjoseph" target="_blank">Policy</a>
                    <a href="https://codepen.io/jo_Geek/" target="_blank">Login</a>
                    <a href="https://jsfiddle.net/user/jo_Geek/" target="_blank">Register</a>
                </div>
            </div>



        </div>
    </header>
    <div class="hd-sep"></div>
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
                Featured Products
            </h2>
        </div>
        <section class="featured-hostels">
            <div class="featured-hostel-box">
                <img class="hostel-feature-image" src="./graphics/hostelpic1.jpg" alt="">
                <h3>Hostel name</h3>
                <p>HostelHub, the world's largest travel site*, enables travelers to unleash the full potential of
                    every trip.
                    With 702 million reviews and opinions covering the world's largest selection of travel listings
                    worldwide –
                    covering 8 million accommodations, airlines, experiences, and restaurants -- HostelHub provides
                    travelers with
                    the wisdom of the crowds to help them decide where to stay, how to fly, what to do and where to
                    eat. </p>
                <div class="rateYo"></div>
                <button id="myBtn">Rate Now</button>

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
                <a class="view-more-button" href="">View More</a>
            </div>
            <div class="featured-hostel-box">
                <img class="hostel-feature-image" src="./graphics/hostelpic2.jpg" alt="">
                <h3>Hostel name</h3>
                <p>HostelHub, the world's largest travel site*, enables travelers to unleash the full potential of
                    every trip. With 702 million reviews and opinions covering the world's largest selection of travel
                    listings worldwide – covering 8 million accommodations, airlines, experiences, and restaurants --
                    HostelHub provides travelers with the wisdom of the crowds to help them decide where to stay, how
                    to fly, what to do and where to eat.</p>
                <div class="rateYo"></div>
                <button id="myBtn">Rate Now</button>

                <a class="view-more-button" href="">View More</a>
            </div>
            <div class="featured-hostel-box">
                <img class="hostel-feature-image" src="./graphics/hostelpic3.jpg" alt="">
                <h3>Hostel name</h3>
                <p>HostelHub, the world's largest travel site*, enables travelers to unleash the full potential of
                    every trip. With 702 million reviews and opinions covering the world's largest selection of travel
                    listings worldwide – covering 8 million accommodations, airlines, experiences, and restaurants --
                    HostelHub provides travelers with the wisdom of the crowds to help them decide where to stay, how
                    to fly, what to do and where to eat.</p>
                <div class="rateYo"></div>
                <button id="myBtn">Rate Now</button>

                <a class="view-more-button" href="">View More</a>
            </div>
        </section>
    </main>

    <footer>
        <div class="footer-left">
            <h3>Hostel Hub</h3>
            <h4>Get in Touch With Us</h4>
            <div class="social-links-top-footer">
                <a href="">
                    <img src="./graphics/facebook.png" alt="">
                </a>
                <a href="">
                    <img src="./graphics/twitter.png" alt="">
                </a>
                <a href="">
                    <img src="./graphics/youtube.png" alt="">
                </a>
                <a href="">
                    <img src="./graphics/instagram.png" alt="">
                </a>
            </div>
            <p>All Rights Reserved with Hostel Hub <br> Copyright Protected©2018</p>
        </div>
        <div class="footer-right">
            <div class="vertically-align-center">
                <h3>SUBSCRIBE</h3>
                <h4>To Get Latest Discount Offers!</h4>
                <input type="text">
                <button type="submit">SUBSCRIBE NOW!</button>
            </div>
        </div>
    </footer>
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
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    btn.onclick = function () {
        modal.style.display = "block";
    }

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