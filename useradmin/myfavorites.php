<html>
    <body>
        <?php
            include("../config.php");
            include("header.php");
        ?> 
        <div class="find">
            <main>
                <?php
                    $user=$_SESSION['user'];
                    if(isset($_GET['id'])){
                        $id = $_GET['id']; 
                        $query = 'SELECT * FROM favorites 
                                    WHERE recipeid='.$id.' AND username="'.$user.'"';
                            
                         $result=$db->query($query);
                        if($result->num_rows > 0){
                            echo 'You already added this recipe as favorite';
                        }else{   
                        $query="INSERT INTO favorites (username, recipeid) VALUES ('$user','$id') ";
                        $stmt = $db->prepare($query);
                        $stmt->execute();
                        }
                    }
                    $stmt = $db->prepare("SELECT recipe.id, recipe.name, recipe.description, recipe.img
                                            FROM favorites 
                                            INNER JOIN recipe ON favorites.recipeid = recipe.id 
                                            INNER JOIN user ON user.username = favorites.username 
                                            WHERE favorites.username='$user'");
                    $stmt->bind_result($id, $name, $description, $image);
                    $stmt->execute();
                    while ($stmt->fetch()) {
                        $n=true;
                        echo '<article class="recipescontainer">';
                            echo "<div class='upper-div' style='background-image:url(../img/$image)'></div>";
                            echo '<div class="lower-div">';
                                echo "<h4> $name </h4>";
                                echo '<a class="onercp-link" href="onerecipe.php?id=' . urlencode($id) . '"></a>';
                                echo '<p class="admin-deletercp-p"><a href="unfavorite.php?id=' . urlencode($id) . '"> Remove From Favorites  </a></p>';
                            echo "</div>";
                        echo "</article>";
                    }
                    if($n==false){
                        echo'<h2>You do not have any favorite recipes</h2>';
                    }  
                ?>
            </main>    
        </div>
        <?php
            include ('footer.php');
        ?>
    </body>
</html>