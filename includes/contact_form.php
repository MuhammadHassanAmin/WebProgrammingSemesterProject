<div id="carea">
	<h1>Quick Contact Us!</h1>
	<p>Get in touch with us to find all your quiries</p>
	<div id="fields">
		<div class="sep"></div>
		<br>
		<form action="<?php echo $path ?>contact_action.php" method="post">
    		 <div id="name_input">
            	<?php 
				if (isset($_COOKIE['FullName'])) {?>
			     <input name="name" placeholder="Name" required="required" type="text" value="<?php echo $_COOKIE['FullName'] ?>" pattern="[A-Za-z\s]+{30}"><?php	
    			}
    			else{
            	?>
                <input name="name" placeholder="Name" required="required" type="text" pattern="[A-Za-z\s]+{30}"><?php } ?>
            </div>
            <div id="email_input">
            	<?php 
				if (isset($_COOKIE['Email'])) {?>
			     <input name="email"  required="required" type="text" value="<?php echo $_COOKIE['Email'] ?>"><?php	
    			}
    			else{
            	?>
                <input name="email" placeholder="Email" required="required" type="email"><?php } ?>
            </div>
            <div id="ph_input">
                <input name="sub" placeholder="Subject" required="required" type="text">
            </div>
    		<div id="msg_input">
                <textarea name="msg" placeholder="your query..." rows="7" required="required"></textarea>
            </div>
    		<div id="cbtn">
                <button type="submit" name="contact_action">Send</button>
            </div>
		</form>
		<br>
	</div>
</div>