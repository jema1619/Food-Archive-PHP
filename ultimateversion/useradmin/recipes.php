<html>
    <body>
        <?php
            include("../config.php");
            include("header.php");
        ?> 
        <div class="find">
            <figure id="leftsidebar">
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
            </figure>
            <div class="rightdiv_rcp">
            <?php      
                $searchrecipe='';
                $type='';
                if (isset($_POST) && !empty($_POST)) {    
                # Get data from form
                    $searchrecipe = trim($_POST['searchrecipe']);
                    $searchrecipe = addslashes($searchrecipe);
                    $type=trim($_POST['type']);
                    $searchrecipe= htmlentities($searchrecipe);
                    $searchrecipe = mysqli_real_escape_string($db, $searchrecipe);
                    $query="select id,name,description,img,type from recipe";

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
                    $stmt->bind_result($id, $name, $description, $image,$type);
                    $stmt->execute();
                    $stmt->store_result();
                    $m=0;
                    while ($stmt->fetch()) {
                        echo '<article class="recipescontainer">';
                            echo "<div class='upper-div' style='background-image:url(../img/$image)'></div>";
                            echo '<div class="lower-div">';
                                echo "<h4> $name </h4>";
                                echo '<a class="onercp-link" target="_blank" href="onerecipe.php?id=' . urlencode($id) . '"></a>';
                                echo "<p class='type'> $type </p>";
                            echo "</div>";
                        echo "</article>";
                        $m=1;
                    }
                    if($m==0){
                        echo "<h2>No enrtries found</h2>";
                    }
                }else{
                    $query = "SELECT id, name, description, img, type FROM recipe";
                    $stmt = $db->prepare($query);
                    $stmt->bind_result($id, $name, $description, $image, $type);
                    $stmt->execute();
                    $stmt->store_result();

                    while ($stmt->fetch()) {
                        echo '<article class="recipescontainer">';
                            echo "<div class='upper-div' style='background-image:url(../img/$image)'></div>";
                            echo '<div class="lower-div">';
                                echo "<h4> $name </h4>";
                                echo '<a  class="onercp-link" target="_blank" href="onerecipe.php?id=' . urlencode($id) . '"></a>';
                                echo "<p class='type'> $type </p>";
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