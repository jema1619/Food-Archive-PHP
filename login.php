<html>
    <body>
        <?php
            include("config.php");
            include("header.php");
        ?> 
    

        <div class="background"> 
            <div class="contact">
                <h4 class="h4">Log In</h4>
                <form class="contactform" enctype="multipart/form-data" method="post" autocomplete="off">
                    <label>User name</label><br>
                    <input class="inputcontact" type="text" name="logname" placeholder="JohnDoe1"/><br><br>
                    <label>Password</label><br>
                    <input class="inputcontact" type="password" name="logpass" placeholder="Password"/><br><br>
                    <input type="submit" name="submit" value="log in" class="submit2"/>    

                    <?php if (isset($_POST) && !empty($_POST)) : ?>
                    <?php
                    //checking if the user is signed into the database
                    $logname = stripslashes($_POST['logname']);
                    $logpass = stripslashes($_POST['logpass']);
                    $logname = mysqli_real_escape_string($db, $logname);
                    $logpass = mysqli_real_escape_string($db, $logpass);
                    $stmt = $db->prepare("SELECT username, password, id FROM user WHERE username = '$logname'");
                    $stmt->execute();
                    $stmt->bind_result($username, $password,$userid);
                    if($userid==NULL){
                        echo'<p style="color:red;">Incorrect username or password.<br>
                        Please try again.</p>';
                    }
                    while ($stmt->fetch()) {
                        if (sha1($logpass) == $password) {
                            $_SESSION['user'] = $logname;
                            header("location:useradmin/mypage.php");
                            exit();
                        }
                    }
                    ?> 
                    <?php endif;?>
                </form>
            </div>
        </div>

        <?php
            include ('footer.php');
        ?>
    </body>

</html>
