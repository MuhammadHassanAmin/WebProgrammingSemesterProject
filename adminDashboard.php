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
   -->
</head>

<body>
   <?php include("includes/header.php")?>

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
    <?php include 'includes/footer.php';  ?>

</body>

</html>
<script>
    $(document).ready(function () {

        $('#hh').click(function () {
            $('#content').load('view_all_hostels.php', 'status=view');
            $('#content').html("<img src=graphics/loading.gif' alt='Loading Packages...'>");
        });
        $('#ho').click(function () {
            $('#content').load('view_all_housers.php', 'status=view');
            $('#content').html("<img src=graphics/loading.gif' alt='Loading Packages...'>");
        });
        $('#uq').click(function () {
            $('#content').load('show_contacts_msg.php', 'status=view');
            $('#content').html("<img src=graphics/loading.gif' alt='Loading Packages...'>");
        });
    });
</script>