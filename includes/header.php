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
                    <a href="<?php $path ?>featured_hostels.php" target="_blank">Featured Hostels</a>
                    <a href="<?php $path ?>about_us.php" target="_blank">About</a>
                    <a href="<?php $path ?>contact_us.php" target="_blank">Contact</a>
                    <a href="<?php $path ?>terms_and_policy.php" target="_blank">Policy</a>
                   <?php if(isset($_SESSION['email']))
                    {?>
                        <a href="<?php $path ?>logout.php" target="_blank">Logout <?php echo $_SESSION['uname']; ?></a>
                        <?php
                    }
                    else
                    {?>
                        <a href="<?php $path ?>login.php" target="_blank">Login</a>
                        <a href="<?php $path ?>registration.php" target="_blank">Register</a>
                    <?php
                        }
                    ?>
                   
                </div>
            </div>



        </div>
    </header>