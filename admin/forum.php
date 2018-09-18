<html>
    <body>     
 
        <?php
            include("../config.php");
            include("header.php");
        ?> 

            <main>
                <?php 
                    $stmt = $db->prepare("SELECT forum_id, forum_name FROM forum");
                    $stmt->execute();        
                    $stmt->bind_result($forum_id, $forum_name);
                    echo '<aside class="forum_aside admin_forum">';
                    echo '<ul>';
                    while ($stmt->fetch()) {
                        echo '<li class="forumli"><a class="myforum_" href="comment.php?id=' . urlencode($forum_id) . '">'.$forum_name.'</a><a class="deleteforum erase" href="deleteforum.php?id='. urlencode($forum_id) . '">Delete</a></li>';
                    }
                    echo '</ul>';
                    echo '</aside>';    
                ?>
                <img class="forum_img" src="../img/talk.png" alt="Smiley face">
            </main>

        <?php
            include ('footer.php');
        ?>
   </body>
</html>