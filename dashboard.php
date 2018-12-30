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
        /* Start  Navbar */

        aside {
            float: left;
            overflow: hidden;
            width: 100%;
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
        aside nav{ width:100%;}
        aside nav .admin-search-bar{
            display:inline-block;
        }
     .options ul{display:inline-block;}

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
    <div class="hd-sep"></div>
    <!--   Main Content  -->
    <main>
        <aside>
            <nav>
                <section class="icon">
                    <ul>
                        <li>
                            <img width="20" height="20" src="https://static.thenounproject.com/png/14173-200.png" alt="">
                        </li>
                        <hr>
                        <li>
                            <img width="20" height="20" src="https://image.flaticon.com/icons/svg/54/54908.svg" alt="">
                        </li>
                        <hr>
                        <li class="select">
                            <img width="20" height="20" src="http://cdn.onlinewebfonts.com/svg/img_304350.png" alt="">
                        </li>
                        <hr>
                        <li>
                            <img width="20" height="20" src="https://cdn1.iconfinder.com/data/icons/business-users/512/circle-512.png"
                                alt="">
                        </li>
                        <hr>
                    </ul>
                </section>
                <section class="options">
                    <p>Dashboard</p>
                    <h6>FILTERS</h6>
                    <ul>
                        <li>Add Hostel</li>
                        <li>Add Packages</li>
                        <li>Add Features</li>
                        <li>View All Hostels</li>
                        <li>Booking Requests
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
        </aside>
        <div id="content">

        </div>
    </main>
</body>
</html>
<script>
    $(document).ready(function(){
       //$('#pfdata').load('view_packages.php','status='+$('input[name=status]:checked').val());
       
       $('input[name=status]').change(function(){
           $('#content').load('view_packages.php','status='+$('input[name=status]:checked').val());
           $('#content').html("<img src=graphics/loading.gif' alt='Loading Packages...'>");
       });

       
       
       $('input[name=status1]').change(function(){
           $('#content').load('view_features.php','status1='+$('input[name=status1]:checked').val());
           $('#content').html("<img src=graphics/loading.gif' alt='Loading Packages...'>");
       });
    });
</script>