<html>
    <body>
        <?php
            include("../config.php");
            include("header.php");
        ?> 
        <div class="find">
            <main>
                <?php
                    $stmt = $db->prepare("SELECT id, name,description,img FROM recipe WHERE username = ?");
                    $stmt->bind_param('s', $_SESSION['user']);
                    $stmt->bind_result($id, $name, $description, $image);
                    $stmt->execute();
                    $m=0;
                    while ($stmt->fetch()) {
                        echo '<article class="recipescontainer admin-article">';
                            echo "<div class='upper-div' style='background-image:url(../img/$image)'></div>";
                            echo '<div class="lower-div">';
                                echo "<h4> $name </h4>";
                                echo '<p class="admin-deletercp-p" ><a href="deleterecipesure.php?id='. urlencode($id) . '"> Delete  </a></p>';
                            echo "</div>";
                        echo "</article>";
                        $m=1;
                    }
                    if($m==0){
                         echo'<h2>You have no recipes to delete</h2>';
                    }
               ?>
         
             </main>   
        </div>
        <?php
            include ('footer.php');
        ?>
    </body>
</html>