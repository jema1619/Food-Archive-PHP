<html>
    <body>
       
        <?php
            include("../config.php");
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
                        echo '<li class="forumli"><a href="forum.php">← Back</a></li>';
                    }
                    echo '</ul>';
                    echo '</aside>';

                    if(isset($_POST['text'])){
                        $comment=$_POST['text'];
                        if (isset($_SESSION['user'])) {
                            $username=$_SESSION['user'];
                            $id = $_GET['id'];
                            $t=time();
                            $date= date("Y-m-d",$t);
                            $comment= htmlentities($comment);
                            $stmt = $db->prepare("INSERT INTO com VALUES (null,?,?,?,?)");
                            $stmt->bind_param('isss',$id, $comment, $date, $username);
                            $stmt->execute();
                            echo '<div class="forumdiv" >';
                            while ($stmt->fetch()) {
                                echo "$id";
                                echo '<div class="forum_innerdiv">';
                                echo '<h5 class="forum_h5">'.$username.'</h5>';
                                echo '<p class="forum_content_text">'.$content.'</p>';
                                echo '<span class="forum_date">'.$date.'</span>';
                                echo '</div>';
                            }
                            echo '</div>';    
                        }
                    }
                    $id = $_GET['id'];
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
                <form method ="POST" id="forum-form">
                    <textarea name="text" rows="5" ></textarea>
                    <input type ="submit" value="Comment" name="Comment">
                </form>
            </main>
        </div>
    
        <?php
            include ('footer.php');
        ?>

    </body>
</html>