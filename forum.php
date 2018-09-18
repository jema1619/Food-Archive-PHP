<html>
    <body>
        <?php
            include("config.php");
            include("header.php");
        ?> 

        <div  class="forum-maindiv"> 
            <main>
                <?php 
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
                <div>
                    <h2 class="forum_h2">Choose a topic and read or discuss with other members!</h2>
                </div>
                <img class="forum_img" src="img/talk.png" alt="Smiley face">
            </main>
        </div>

        <?php
            include ('footer.php');
        ?>
   </body>
</html>