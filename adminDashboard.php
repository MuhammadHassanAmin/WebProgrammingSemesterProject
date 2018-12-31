<?php include 'includes/config.php'; 
    if(!(isset($_SESSION['email'])&&$_SESSION['role']=="admin"))
    {
        header('Location: login.php');
    }
    if (isset($_GET['delete'])) {
        $id = $_GET['id'];  
        $status = 'activated'; 
        $delete_sql="Delete from contact where id='".$id."'";
        $db->query($delete_sql);
        header('Location: admindashboard.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Hostel Hub</title>
    <?php include 'includes/links.php'; ?>
</head>
<body>
   <?php include("includes/header.php")?>
    <!--   Main Content  -->
    <main>
        <section class="dashboard">
            <nav>
                <section class="options">
                    <p>Dashboard</p>
                    <ul>
                        <li id="hh">Hostels</li>
                        <li id="ho">Hostels Owners</li>
                        <li id="uq">Users Queries
                        </li>
                        <li><a href="alogout.php">Logout</a></li>
                    </ul>
                </section>
            </nav>
        </section>
    </main>
    <br><br><br><br><br>
    <div id="content">
     <?php include 'view_all_hostels.php'; ?>
    </div>
    <?php include 'includes/footer.php';  ?>
    <script>
    $(document).ready(function () {
        $('#hh').click(function () {
            $('#content').load('view_all_hostels.php', 'status=view');
            $('#content').html("<img src='graphics/loading.gif' alt='Loading Packages...'>");
        });
        $('#ho').click(function () {
            $('#content').load('view_all_housers.php', 'status=view');
            $('#content').html("<img src='graphics/loading.gif' alt='Loading Packages...'>");
        });
        $('#uq').click(function () {
            $('#content').load('show_contacts_msg.php', 'status=view');
            $('#content').html("<img src='graphics/loading.gif' alt='Loading Packages...'>");
        });
    });
</script>
</body>
</html>
