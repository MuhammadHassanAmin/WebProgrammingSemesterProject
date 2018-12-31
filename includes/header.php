<div class="header-top">
        <div class="social-links-top-header">
            <a href="https://www.facebook.com/" target="_blank">
                <img src="./graphics/facebook.png" alt="">
            </a>
            <a href="https://twitter.com/" target="_blank">
                <img src="./graphics/twitter.png" alt="">
            </a>
            <a href="https://www.youtube.com/" target="_blank">
                <img src="./graphics/youtube.png" alt="">
            </a>
            <a href="https://www.instagram.com/" target="_blank">
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
                    <a href="<?php $path;?>index.php"> <img src="./graphics/logo.png" alt="logo"></a>
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
                    <a href="<?php $path ?>featured_hostels.php">Featured Hostels</a>
                    <a href="<?php $path ?>about_us.php">About</a>
                    <a href="<?php $path ?>contact_us.php">Contact</a>
                    <a href="<?php $path ?>terms_and_policy.php">Policy</a>
                   <?php if(isset($_SESSION['email']))
                    { 
                        if($_SESSION['role']=='houser')
                        {
                            ?><a href="<?php $path ?>dashboard.php">Dashboard</a>
                            <?php
                        }
                        else if($_SESSION['role']=='admin')
                        {
                            ?><a href="<?php $path ?>admindashboard.php">Dashboard</a>
                            <?php
                        }
                        ?>
                        <a href="<?php $path ?>logout.php" target="_blank">Logout <?php echo $_SESSION['uname']; ?></a>
                        <?php
                    }
                    else
                    {?>
                        <a href="<?php $path ?>login.php">Login</a>
                        <a href="<?php $path ?>registration.php">Register</a>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </header>