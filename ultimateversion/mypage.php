<html>
    <body>

		<?php
			include("config.php"); 
			include("header.php");
		?> 

		<div>
		<?php
		    if (!isset($_SESSION['user'])):
		       // echo'<h4>If you log in, you will be able to add recipes and comment in the forum section of our website</h4>';
		        //echo '<h4> Please log in to see your personalized page</h4>';
		        //echo '<a href="login.php">Log In</a>';
            ?>
            <div class="mp_div_not">
                <h4 class="mp_h4_not">
                    Become a member! 
                </h4>       
                <p class="mp_p_not">
                    And get acces to more fun and interact with other members. You will be able to add, delete and edit recipes, comment and interact with other members in the forum section. As a member you can rate recipes and add recipes as your favorite and get own page where you have quick access to your own recipes and your favorites.
                </p>
                <p class="mp_login_link">
                    <a href="signup.php">Sign up</a>
                </p>
            
            </div>
            
            <div>
                <div class="background" style="filter: blur(5px);"> 
                </div>
            </div>
            
            <?php
		  endif; 
		?> 
		</div>

		<?php
			include ('footer.php');
		?>
    </body>
</html>
