<?php include 'includes/config.php';  ?>

<!DOCTYPE html>
<html>

<head>
    <title>Hostel Tracker</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo $path ?>css/main.css">
    <script src="<?php echo $path ?>js/jquery-3.2.1.min.js"></script>
    <link rel="icon" href="<?php echo $path ?>graphics/icon.png" type="image/png" sizes="16x16">

    <!--[if lt IE 9]>
	    <script src="/js/respond.min.js"></script>
	    <script src="/js/html5shiv-printshiv.js"></script>
	<![endif]-->
    <style>
        /* Header CSS */
        


        /* Start  Navbar */

        section.dashboard {
            float: left;
            overflow: hidden;
            width: 100%;
            margin-top:20px;
        }
      
        section .dashboard nav,.options{
            width:100%;
        }
        .admin-search-bar{float:right; margin-right:50px;}

           .admin-search-bar button  {padding: 0 10px;
    border-radius: 10px;
    outline: none;
    height: 26px;}
        .admin-search-bar input {
            width: 250px;
            padding: 0 10px;
            border-radius: 10px;
            outline: none;
            height: 25px;}
        nav .icon ul {
            box-shadow: 2px 0 8px #000
        }

        nav .icon ul li {
            padding: 20px
        }

        nav .icon ul li:hover {
            background-color: #5C9DF5;
            color: #FFF;
            cursor: pointer
        }

        nav .icon ul .select {
            background-color: #191b1e59;
            border-left: 3px solid #5C9DF5
        }

        nav .icon,
        nav .options {
            float: left
        }

        nav .options p {
            color: black;
            font-size: 20px;
            padding: 5px 40px 5px 20px
        }

        nav .options h6 {
            color: #383B42;
            font-family: Arial, Tahoma;
            padding-left: 20px;
            margin: 10px 0
        }
        .admin-search-bar {
            display: inline-block;
        }
        nav .options ul { 
            display : inline-block;
        }
        nav .options ul li {
            padding: 5px 5px 5px 20px;
            height: 22px
        }

        nav .options ul li:hover {
            background-color: rgba(0, 0, 0, 0.2);
            cursor: pointer
        }

        nav .options ul li span {
            margin-left: 20px;
            border: 1px solid #4B4E57;
            padding: 2px 5px;
            border-radius: 48%;
            font-size: 11px;
            color: #4B4E57
        }

        nav .options .nu {
            padding-left: 8px;
            padding-right: 8px
        }

        /* End Navbar */
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
    <main>
        <section class="dashboard">
            <nav>
                <section class="options">
                    <p>Dashboard</p>
                    <h6>FILTERS</h6>
                    <ul>
                        <li id="hh">Hostels</li>
                        <li id="ho">Hostels Owners</li>
                        <li id="uq">Users Queries
                            <span>32</span>
                        </li>

                    </ul>
                    <div class="admin-search-bar">
                        <input type="text">
                        <button type="submit">Search</button>
                    </div>
                    <h6>RECENT</h6>
                </section>

            </nav>
        </section>
    </main>
    <div id="content">

    </div>
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

</html>
<script>
    $(document).ready(function(){
       
       $('#hh').click(function(){
           $('#content').load('view_all_hostels.php','status=view');
           $('#content').html("<img src=graphics/loading.gif' alt='Loading Packages...'>");
       });
       $('#ho').click(function(){
           $('#content').load('view_all_housers.php','status=view');
           $('#content').html("<img src=graphics/loading.gif' alt='Loading Packages...'>");
       });
       $('#uq').click(function(){
           $('#content').load('show_contacts_msg.php','status=view');
           $('#content').html("<img src=graphics/loading.gif' alt='Loading Packages...'>");
       });
    });
</script>