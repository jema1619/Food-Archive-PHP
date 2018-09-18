<html>
    <body>
        <?php 
            include ("../config.php");
            include("header.php");  
        ?>
        <main>
            <div class="sure_div">
                <h2 class="h2_sure">
                    Are you sure you want to delete this comment?
                </h2>
                <form class="admin-yesno" method="post">
                    <input type="radio" name='positive' value="Yes"/>Yes <br><br>
                    <input type="radio" name='positive' value="No" />No
                    <input class="delete-sure-submit" type="submit" value="Submit"/>
                </form>
                    
                <?php     
                    if(isset($_POST['positive'])){
                        $answer=$_POST['positive'];
                        if($answer=='Yes'){
                            $idcom=$_GET['id'];
                        }
                        if($answer=='No'){
                            header("location:recipes.php");
                        } 
                    }              
                    if(!empty($idcom)){
                        $stmt = $db->prepare("DELETE FROM com WHERE id =?");
                        $stmt->bind_param('i', $idcom);
                        $response = $stmt->execute();
                        echo'<h2 class="h2_sure">Comment deleted';
                        echo'<a class="admingoback" href="forum.php"> Go back to forum page</a></h2>';
                    }
                ?>
            </div>
        </main>
            
		<?php 
            include("footer.php"); 
        ?>
    </body>
    
</html>


