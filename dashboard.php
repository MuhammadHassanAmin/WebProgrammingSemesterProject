<?php include 'includes/config.php'; 
     if(!(isset($_SESSION['email'])&&$_SESSION['role']=="houser"))
     {
         header('Location: login.php');
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
    <script src="<?php echo $path ?>js/jquery-3.2.1.min.js"></script>
    <link rel="icon" href="<?php echo $path ?>graphics/icon.png" type="image/png" sizes="16x16">
    <?php include 'includes/links.php';?>
</head>

<body>
    <?php include 'includes/header.php' ?>
    <!--   Main Content  -->
    <main>
        <aside>
            <nav>
              
                <section class="d-inline-block options w-95p">
                    <p>Dashboard</p>
                    <ul>
                        <li id="ah">Add Hostel</li>
                        <li id="ap">Add Packages</li>
                        <li id="af">Add Features</li>
                        <li id="ag">Add Gallery</li>
                        <li id="vah">View All Hostels</li>
                    </ul>
                </section>
            </nav>
        </aside>
        <article>
            <div id="content">
                <?php include 'view_hostels.php'; ?>
            </div>
        </article>
    </main>
    <footer>
        <?php include 'includes/footer.php' ?>
    </footer>
</body>

</html>
<script>
    $(document).ready(function () {
        $('#ah').click(function () {
            $('#content').load('add_hostel.php', 'status=view');
            $('#content').html("<img src=graphics/loading.gif' alt='Loading Packages...'>");
        });
        $('#ap').click(function () {
            $('#content').load('add_package.php', 'status=view');
            $('#content').html("<img src=graphics/loading.gif' alt='Loading Packages...'>");
        });
        $('#af').click(function () {
            $('#content').load('add_feature.php', 'status=view');
            $('#content').html("<img src=graphics/loading.gif' alt='Loading Packages...'>");
        });
        $('#ag').click(function () {
            $('#content').load('add_gallery.php', 'status=view');
            $('#content').html("<img src=graphics/loading.gif' alt='Loading Packages...'>");
        });
        $('#vah').click(function () {
            $('#content').load('view_hostels.php', 'status=view');
            $('#content').html("<img src=graphics/loading.gif' alt='Loading Packages...'>");
        });
    });
</script>