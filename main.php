<?php include 'includes/config.php';  ?>

<!DOCTYPE html>
<html>

<head>
    <title>Hostel Tracker</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo $path ?>css/main.css">
    <link rel="stylesheet" href="/css/jquery.rateyo.css" />
    <script src="<?php echo $path ?>js/jquery-3.2.1.min.js"></script>
    <script src="./js/jquery.rateyo.js"></script>
    <link rel="icon" href="<?php echo $path ?>graphics/icon.png" type="image/png" sizes="16x16">

    <!--[if lt IE 9]>
	    <script src="/js/respond.min.js"></script>
	    <script src="/js/html5shiv-printshiv.js"></script>
	<![endif]-->

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
            <div class="header__logo">
                <img src="./graphics/logo.png" alt="logo">
            </div>

            <!-- Search Bar -->
            <div class="header__search-bar">
                <form action="">
                    <input type="text" value="" placeholder="Search......">
                </form>
            </div>

            <!-- Nav -->
            <nav class="navbar">
                <input type="checkbox" id="nav-links">
                <label for="nav-links"></label>
                <ul class="navbar__nav">
                    <li class="navbar__item"><a href="#">Log In</a></li>
                    <li class="navbar__item"><a href="#">Sign Up</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="hd-sep"></div>
    <!--   Main Content  -->
    <main class="main-container">

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
                    <form action="" method="get">
                        <input name="rateBTN" type="submit" value="Rate Now">
                    </form>
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

    });
</script>

</html>