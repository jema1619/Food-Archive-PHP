<html>
    <body>
        
        <?php 
            include ("../config.php");
            include("header.php");   
        ?>
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
                        $idrecipe=$_GET['id'];
                    }
                    $stmt = $db->prepare("delete from recipe where id = ?");
                    $stmt->bind_param('i',$idrecipe);
                    $response = $stmt->execute();
                    echo'<h2 class="h2_sure"> Recipe deleted';
                    echo'<a class="admingoback" href="deleterecipe.php"> Go back to recipes page</a></h2>';
                    if($answer=='No'){
                        header("location:deleterecipe.php");
                    } 
                }  
            ?>
        </div>
        </main>
        <?php 
            include("footer.php"); 
        ?>
    </body>
</html>


