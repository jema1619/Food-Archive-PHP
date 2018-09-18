<html>
    <head>
        <title>Admin Login</title>
        <link rel="stylesheet" type="text/css" href="../style.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Grand+Hotel|Lilita+One" rel="stylesheet">
    </head>
    <body>
        <?php
            include ("../config.php");   
        ?>
        <header>
            <ul>
                <li>
                    <a href="index.php" id="logomenu">FA</a>
                </li>
                <li>
                    <a class="<?php echo ($current_page == 'logout.php') ? 'active' : NULL ?>" href="logout.php">Return to User Page</a>
                </li>
            </ul>
        </header>

        <main>
    		<form class="adminform"  method="post" >
                <fieldset class="admin-fieldset">
                    <legend>Admin - Log in</legend>
                    <label>Username</label> <br>
                    <input type="text" name="adminname"/> <br>
                    <label>Password</label> <br>
                    <input type="password" name="adminpass" /> <br>
                    <input id="admin-btn" type="submit" name="submit" value="Go"/> <br>
                </fieldset>
    		
                <?php 
                    if(isset($_POST) && !empty($_POST)) : 
                        session_start();
                        $adminname =  stripslashes($_POST['adminname']);
                        $adminpass =  stripslashes($_POST['adminpass']);
                        $adminname= htmlentities($adminname);
                        $adminname = mysqli_real_escape_string($db, $adminname);
                        $adminpass= htmlentities($adminpass);
                        $adminpass = mysqli_real_escape_string($db, $adminpass);
                       
                        $stmt = $db->prepare("SELECT adminname, adminpass FROM admin WHERE adminname = ?");
                        $stmt->bind_param('s', $adminname);
                        $stmt->execute();
                        $stmt->bind_result($username, $password);

                        while ($stmt->fetch()) {
                            if (sha1($adminpass) == $password){               
                                $_SESSION['username'] = $username;
                                header("location:welcome.php");
                                exit();
                            }else{
                                echo'Incorrect password';
                            }
                        }
                ?>
                <?php endif;?>

            </form>
               
        </main>

        <?php 
            include("footer.php"); 
        ?>

    </body>
</html>
