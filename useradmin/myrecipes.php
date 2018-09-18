<html>
  <body>
    <?php
      include("../config.php");
      include("header.php");
    ?> 
    <div class="find">
      <main>
        <?php 
          $stmt = $db->prepare("SELECT id, name,description,img,type FROM recipe WHERE username = ?");
          $stmt->bind_param('s', $_SESSION['user']);
          $stmt->bind_result($id, $name, $description, $image,$type);
          $stmt->execute();
          $k=0;
          while ($stmt->fetch()) {
            echo '<article class="recipescontainer">';
              echo "<div class='upper-div' style='background-image:url(../img/$image)'></div>";
              echo '<div class="lower-div">';
                  echo "<h4> $name </h4>";
                  echo '<a class="onercp-link" href="onerecipe.php?id=' . urlencode($id) . '"></a>';
                  echo '<a class="myrcp-editlink" href="editrecipe.php?id=' . urlencode($id) . '"> Edit </a>';
                  echo "<p class='type'> $type </p>";
              echo "</div>";
            echo "</article>";
            $k=1;
          }
          if($k==0){
           echo'<h2>You have not added any recipies</h2>';
          }  
        ?>
      </main>  
    </div>
    <?php
      include ('footer.php');
    ?>
  </body>
</html>