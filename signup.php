<html>
    <body>
        <?php
            include("config.php");
            include("header.php");
        ?> 
        <div class="background"> 
            <div class="contact">
                <h4 class="h4">Sign Up</h4>
                <form class="contactform" enctype="multipart/form-data" method="post">
                    <label>User name<span class="signup_required" >*</span></label><br>
                    <input class="inputcontact" type="text" name="username" required/><br><br>
                    <label>E-mail:<span class="signup_required" >*</span></label><br>
                    <input class="inputcontact" type="email" name="email" required /><br><br>
                    <label>Password<span class="signup_required" >*</span></label><br>
                    <input class="inputcontact" type="password" name="userpass" required /><br><br>
                    <label>Repeat password<span class="signup_required" >*</span></label><br>
                    <input class="inputcontact" type="password" name="userpassd" required /><br><br>
                    <input type="submit" name="submit" value="Sign Up" class="submit2"/>
                    
                    <?php //check if the form is filled in and submitted
                         if (!empty($_POST['username'])&& !empty($_POST['userpass'])&& !empty($_POST['userpassd']) && !empty($_POST['email'])){
                            if (isset($_POST['username'])&& isset($_POST['userpass'])&& isset($_POST['userpassd']) && isset($_POST['email'])) {
                            
                                $username = trim($_POST['username']);
                                $userpass =trim($_POST['userpass']);
                                $userpassd = trim($_POST['userpassd']);
                                $email = trim($_POST['email']);
                                $username= htmlentities($username);
                                $username = mysqli_real_escape_string($db, $username);
                                $userpass= htmlentities($userpass);
                                $userpass = mysqli_real_escape_string($db, $userpass);
                                $userpassd= htmlentities($userpassd);
                                $userpassd = mysqli_real_escape_string($db, $userpassd);
                                $email= htmlentities($email);
                                $email = mysqli_real_escape_string($db, $email);
                                //inserting user into database and sha1 the password
                                    if($userpass == $userpassd){
                                        $userpass= sha1($userpass);
                                        $q="SELECT username FROM user WHERE username = '$username'";
                                        $stmt = $db->prepare($q);
                                        $stmt->execute();
                                        $stmt->bind_result($u);
                                        while($stmt->fetch()){
                                            if($u==$username){
                                                $n=true;
                                            }
                                        }
                                        if($n==false){
                                            $stmt = $db->prepare("insert into user values (null, ?,?,?)");
                                            $stmt->bind_param('sss', $username, $userpass, $email);
                                            $stmt->execute();
                                            echo '<h3>Your information was submitted</h3>';
                                            echo '<a style="color:#000; text-decoration:none; align:center;" href="login.php" > Log in</a>';
                                        }else{
                                            echo '<p style="color:red;">Username already taken!<p>';   
                                        }
                                    }else{
                                        echo '<p style="color:red;">Passwords not matching!<p>';
                                    }
                                }
                            }
                    ?>
                </form>
            </div>
        </div>
            
        <?php
            include ('footer.php');
        ?>
    </body>
</html>
