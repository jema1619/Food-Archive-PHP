 <html>
    <body>    
        <?php
            include("../config.php");
            include("header.php");
        ?> 

        <div class="forum-maindiv">  
            <main>
                <?php 
                    if(isset($_POST['text'])){
                        $forum_name=$_POST['text'];

                        if (isset($_SESSION['user'])) {
                        $username=$_SESSION['user'];
                        $stmt = $db->prepare("INSERT INTO forum VALUES (null,?,?)");
                        $stmt->bind_param('ss',$forum_name, $username);
                        $stmt->execute();
                        }
                    }
                    $stmt = $db->prepare("SELECT forum_id, forum_name FROM forum");
                    $stmt->execute();        
                    $stmt->bind_result($forum_id, $forum_name);
                    echo '<aside class="forum_aside">';
                    echo '<ul>';
                    while ($stmt->fetch()) {
                        echo '<li class="forumli"><a href="comment.php?id=' . urlencode($forum_id) . '">'.$forum_name.'</a></li>'; 
                    }
                    echo '</ul>';
                    echo '</aside>'; 
                ?>

                <div class="ask_question">
                     <form method ="POST" class="contactform" >
                            <input class="inputcontact" type="text" name="text">
                            <input class="submit2" type ="submit" value="Add Topic" name="Comment">
                    </form>
                    <img class="forum_img" src="../img/talk.png" alt="Smiley face">
                </div>
            </main>
        </div>

        <?php
            include ('footer.php');
        ?>
   </body>
</html>