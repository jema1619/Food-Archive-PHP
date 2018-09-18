<html>
    <body>
        <?php
            include("../config.php");
            include("header.php");
        ?> 
        <div class="find">
            <figure id="leftsidebar" class="admin-addrcp-figure">
                <form id="filter" method="post">
                    <input type="text" placeholder="search..." maxlength="20" name="searchrecipe"  id="filtersearch"/>
                    <select id="mySelect" name="type">
                       <option value="%%"> All </option>
                        <option value="Dessert">Dessert</option>
                        <option value="Drinks">Drinks</option>
                        <option value="Appetizer">Appetizer</option>
                        <option value="Main">Main Course</option>
                    </select>
                    <input type="submit" class="submit" value="search" name="submit"/>
                </form>
                <div class="admin-addrcp"><a href="addrecipe.php"> Add Recipe </a>
                </div>
            </figure>
            <div class="rightdiv_rcp">
            <?php   
                $searchrecipe='';
                $type='';
                if (isset($_POST) && !empty($_POST)) {      
                    # Get data from form
                    $searchrecipe = trim($_POST['searchrecipe']);
                    $type=trim($_POST['type']);
                    $searchrecipe = addslashes($searchrecipe);
                    $query="select id,name,description,img from recipe";
                    if ($searchrecipe && !$type) { // Name search only
                        $query=$query." where name like '%".$searchrecipe ."%'";
                    }
                    if (!$searchrecipe && $type) { // Type search only
                        $query=$query." where type LIKE '". $type ."' AND type LIKE '%%'";
                    }
                    if ($searchrecipe && $type) { // Name and Type search
                        $query = $query . " where name like '%".$searchrecipe."%' and type LIKE '".$type."' AND type LIKE '%%'"; 
                    }   
                    $stmt = $db->prepare($query);
                    $stmt->bind_result($id, $name, $description, $image);
                    $stmt->execute();
                    $m=0;
                    while ($stmt->fetch()) {
                        echo '<article class="recipescontainer adminarticle">';
                            echo "<div class='upper-div' style='background-image:url(../img/$image)'></div>";
                            echo '<div class="lower-div">';
                                echo "<h4> $name </h4>";
                                echo '<a  class="onercp-link" target="_blank" href="onerecipe.php?id=' . urlencode($id) . '"></a>';
                                echo '<p class="admin-deletercp-p p2" ><a href="editrecipe.php?id='. urlencode($id) . '"> Edit  </a></p>';
                                echo '<p class="admin-deletercp-p" ><a href="deleterecipesure.php?id='. urlencode($id) . '"> Delete  </a></p>';
                            echo "</div>";
                        echo "</article>";
                        $m=1;
                    }
                    if($m==0){
                        echo "<h2>No enrtries found</h2>";
                    }
                }else{
                    $query = "SELECT id, name, description, img FROM recipe";
                    $stmt = $db->prepare($query);
                    $stmt->bind_result($id, $name, $description, $image);
                    $stmt->execute();
                    while ($stmt->fetch()) {
                        echo '<article class="recipescontainer adminarticle">';
                            echo "<div class='upper-div' style='background-image:url(../img/$image)'></div>";
                            echo '<div class="lower-div">';
                                echo "<h4> $name </h4>";
                                echo '<a  class="onercp-link" target="_blank" href="onerecipe.php?id=' . urlencode($id) . '"></a>';
                                echo '<p class="admin-deletercp-p p2" ><a href="editrecipe.php?id='. urlencode($id) . '"> Edit  </a></p>';
                                echo '<p class="admin-deletercp-p" ><a href="deleterecipesure.php?id='. urlencode($id) . '"> Delete  </a></p>';
                            echo "</div>";
                        echo "</article>";
                    }
                }
            ?>   
            </div>
        </div>
        <?php
            include ('footer.php');
        ?>
    </body>
</html>