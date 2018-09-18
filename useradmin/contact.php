<html>
    <body>
                
        <?php
            include ('../config.php');
            include ('header.php');
        ?>
        <main>
            <div class="contact">
                <h4 class="h4">Contact Us</h4>
                <?php
                    if(isset($_POST['submit'])) {
                        $name = $_POST['name'];
                        $email = $_POST['email'];
                        $message = $_POST['message'];
                        if( $query = "INSERT INTO `contact` (name, email, message) VALUES ('$name', '$email', '$message')"){
                            echo "<p class='h2_sure'> E-Mail Sent successfully </p>";
                            $result = $db->query($query);
                        }
                    }
                ?>
                <form class="contactform" action="contact.php" method="post" >
                    <label>Name:</label><br>
                    <input class="inputcontact" name="name"><br><br>
                    <label>E-mail:</label><br>
                    <input class="inputcontact" type="email" name="email"><br><br>
                    <label>Message:</label><br>
                    <textarea name="message"></textarea><br><br>
                    <input value="Send" type="submit" class="submit2" name="submit">
                </form>
            </div>
        </main>

        <?php 
            include ('footer.php'); 
        ?>
    </body>
</html>