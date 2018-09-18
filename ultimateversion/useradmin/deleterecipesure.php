<html>
    <body>
        <?php
            include("../config.php");
            include("header.php");
        ?> 
        <div id="find">
            <main>
                <div class="sure_div">
                    <h2 class="h2_sure">
                        Are you sure you want to delete this recipe?
                    </h2>
                    <form class="admin-yesno" method="post">
                        <input type="radio" name='positive' value="Yes" />Yes
                        <input type="radio" name='positive' value="No" />No
                         <input type="submit" class="delete-sure-submit" value="Submit"/>
                    </form>
                    <?php 
                        if(isset($_POST['positive'])){
                            $answer=$_POST['positive'];
                            if($answer=='Yes'){
                            $idrecipe=$_GET['id'];}
                            if($answer=='No'){
                            header("location:recipes.php");
                            } 
                        }
                        if(!empty($idrecipe)){
                            $stmt = $db->prepare("delete from recipe where id =?");
                            $stmt->bind_param('i', $idrecipe);
                            $response = $stmt->execute();
                            echo'<h2 class="h2_sure">Recipe deleted';
                            echo'<div class="deletercp_div" >';
                            echo'<a class="delete-go" href="recipes.php">Recipes page</a>';
                            echo'<a class="delete-go no" href="deleterecipe.php">Delete more recipes</a></div></h2>';   
                        }  
                    ?>
                </div>   
            </main>
        </div>

        <?php
            include ('footer.php');
        ?>
    </body>
</html>