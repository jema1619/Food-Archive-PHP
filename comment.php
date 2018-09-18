<html>
    <body>
       
        <?php
            include("config.php");
            include("header.php");
        ?> 
        <div class="forum-maindiv"> 
            <main> 
                <?php
                    $id = $_GET['id']; 
                    $stmt = $db->prepare("SELECT forum_id, forum_name FROM forum WHERE forum_id= '$id'");
                    $stmt->execute();        
                    $stmt->bind_result($forum_id, $forum_name);
                    echo '<aside class="forum_aside">';
                    echo '<ul>';
                    while ($stmt->fetch()) {
                        echo '<li class="forumli"><a href="comment.php?id=' . urlencode($forum_id) . '">'.$forum_name.'</a></li>'; 
                        echo '<li class="forumli"><a href="forum.php">&laquo; Back</a></li>';
                    }
                    echo '</ul>';
                    echo '</aside>';
                        
                    $sql="SELECT content,username,date FROM com WHERE forum = '$id'";

                    $stmt = $db->prepare($sql);
                    $stmt->bind_result($content, $username, $date);
                    $stmt->execute();
                    echo '<div class="forumdiv" >';
                    while ($stmt->fetch()) {
                        echo '<div class="forum_innerdiv">';
                        echo '<h5 class="forum_h5">'.$username.'</h5>';
                        echo '<p class="forum_content_text">'.$content.'</p>';
                        echo '<span class="forum_date">'.$date.'</span>';
                        echo '</div>';
                    }
                    echo '</div>';
                ?>  
            </main>
        </div> 

        <?php
        include ('footer.php');
        ?>

    </body>
</html>