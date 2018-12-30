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
        <h1>Hostel Owner Registration!</h1>
        <div id="fields">
        <div class="sep"></div>
		<br>

                <form action="registration-action.php" method="post" enctype="multipart/form-data">
                         <div>

                        <input type="text" name="username" placeholder="user name" required>
                    </div>
                    <div>
                        <input type="text" name="email" placeholder="email" required>
                    </div>

                    <div>
                        <input type="text" name="ph" placeholder="Phone Number" required>
                    </div>
                    <div>
                        <input type="text" name="city" placeholder="City" required>
                    </div>
                    <div>
                        <textarea name="address" id="" cols="30" rows="10" placeholder="enter your address.." required></textarea>
                    </div>
                    <div>
                        <select name="role" id="">
                            <option value="user">Public User</option>
                            <option value="houser">Hostel Owner</option>
                        </select>
                    </div>
                    <div> 
                        <label for="">Select Profile Picture</label><br>
                        <input type="file" class="left-30" name="profile">
                    </div>
                    <div>
                        <input type="password" name="pass" placeholder="****" required>
                    </div>
                    <div>
                        <button type="submit" name="registration_action">Register</button>
                    </div>
                </form>
           
        </div>
    </div>
    <?php
        include "includes/footer.php";
    ?>
</body>

</html>