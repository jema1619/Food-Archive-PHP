<html>
    <body>
        <?php
            include("../config.php");
            include("header.php");
        ?> 
        <main>
            <div class="sure_div">
               <h2 class="h2_sure">
                    Are you sure you want to unfavorite this recipe?
                </h2>
                <form class="admin-yesno" method="post">
                    <input type="radio" name='positive' value="Yes" />Yes
                    <input type="radio" name='positive' value="No" />No
                    <input type="submit" class="delete-sure-submit" value="Submit"/>
                </form>
                    <?php 
                        $user=$_SESSION['user'];
                        if(isset($_POST['positive'])){
                            $answer=$_POST['positive'];
                            if($answer=='Yes'){
                            $idrecipe=$_GET['id'];}
                            if($answer=='No'){
                            header("location:recipes.php");
                            } 
                        }             
                        if(!empty($idrecipe)){
                            $stmt = $db->prepare("Delete FROM favorites where favorites.recipeid='$idrecipe' and favorites.username='$user' ");
                            $stmt->execute();
                            echo'<h2 class="h2_sure">Unfavorite recipe done';
                            echo'<br>';
                            echo'<a class="admingoback" href="myfavorites.php"> Go back to your favorites recipes</a></h2>';       
                        }
                    ?>
             </div>
        </main>

        <?php
            include ('footer.php');
        ?>
    </body>
</html>