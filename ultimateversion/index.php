<html>
    <body>
        <?php
            include("config.php");
            include("header.php");
        ?>
        <main id="mainindex">
            <div id="topdiv">
                <h1>Food archive</h1>
                <h2>Collect all your ideas and inspiration in one spot</h2>
                <form class="search" action="recipes.php" method="post">
                    <input type="text" value="" name="searchrecipe" placeholder="Search..">                            
                    <input name="type" id="inputlink" type="submit" value=""/>
                </form>
            </div>

            <?php
                if(isset($_COOKIE['visitor'])){ 
                    $pastvisitor = $_COOKIE['visitor']; 
                } 
                $time = 31536000 + time(); 
                setcookie("visitor", time (), $time); 
                if (isset ($pastvisitor)){ 
                    $change = time () - $pastvisitor; 
                    if ( $change > 86400){ 
                        echo "<h2> Welcome back! <br> Been some time since you visited ". date("Y/M/D",$pastvisitor)."" ;
                        echo'</h2>'; 
                    }else{
                        echo "<h2>Welcome back!</h2>"; 
                    }
                }else{ 
                    echo "<h2> Welcome to our site!</h2>"; 
                } 
            ?>
            
            <?php

                $query = "SELECT id, name, img FROM recipe ORDER BY rand() LIMIT 4";
                $stmt = $db->prepare($query);
                $stmt->bind_result($id, $name, $image);
                $stmt->execute();
                $stmt->store_result();
                while ($stmt->fetch()) {
                    $average=0;
                    $count=0;
                    $q="SELECT rating from rating where recipeid='$id'";
                    $sstmt = $db->prepare($q);
                    if($sstmt!==false){
                        $sstmt->bind_result($rating);
                        $sstmt->execute();
                        $sstmt->store_result();
                        while($sstmt->fetch()){
                            $count++;
                            $average +=$rating;
                        }
                        if($count!==0){
                        $average=$average/$count;  
                        }
                    }
                    $average=round($average);
                    echo '<article">';
                        echo "<div class='left-div' style='background-image:url(img/$image)'></div>";
                            echo '<div class="right-div"><a class="index_link" href="onerecipe.php?id=' . urlencode($id) . '"></a>';
                                echo '<h3><a class="h3-text" href="onerecipe.php?id=' . urlencode($id) . '"> '.$name.' </a></h3>';
                            echo '<div class="stars">
                              <form class="rating" method="post">
                                    <input id="star5" type="radio" name="star" value="star5" onclick="rating()" '; if ($average == '1') echo "checked"; echo ' />
                                    <label class="ratingstar nothover" for="star5">&#9733</label>
                                    <input id="star4" type="radio" name="star" value="star4" onclick="rating()"';  if ($average == '2') echo "checked"; echo '/>
                                    <label class="ratingstar nothover" for="star4">&#9733</label>
                                    <input id="star3" type="radio" name="star" value="star3" onclick="rating()"'; if ($average == '3') echo "checked"; echo'/>
                                    <label class="ratingstar nothover" for="star3">&#9733</label>
                                    <input id="star2" type="radio" name="star" value="star2" onclick="rating()"'; if ($average == '4') echo "checked"; echo'/>
                                    <label class="ratingstar nothover" for="star2">&#9733</label>
                                    <input id="star1" type="radio" name="star" value="star1" onclick="rating()"';  if ($average == '5') echo "checked"; echo'/>
                                    <label class="ratingstar nothover" for="star1">&#9733</label>
                              </form>
                            </div>';
                        echo "</div>";
                    echo "</article>";
                }
            ?>
        </main>
        <?php
            include ('footer.php');
        ?>
    </body>
</html>
