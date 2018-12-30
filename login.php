<?php include 'includes/config.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Hostel Tracker</title>
    <meta charset="utf-8">
    <?php include 'includes/links.php'; ?>
</head>

<body>
    <?php
        include "includes/header.php";
    ?>
    <div id="carea">
        <h1>Login</h1>
        <div id="fields">
            <div class="sep">

            </div>
            <br>
            <form action="authentication.php" method="post">
                <div id="name_input">
                    <input type="text" name="email" placeholder="user name">
                    <div id="email_input">
                        <input type="password" name="pass" placeholder="*******">

                        <div id="cbtn">
                            <button type="submit" name="submit">Login</button>
                        </div>
                    </div>
            </form>
            <br>
        </div>
    </div>
    </div>
    <?php
        include "includes/footer.php";
    ?>
</body>

</html>