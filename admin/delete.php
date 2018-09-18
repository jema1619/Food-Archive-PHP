<html>
    <body>
        <?php 
            include ("../config.php");
            include("header.php");     
        ?>
        <main>
            
        <div class="sure_div">
            <h2 class="h2_sure">
                Are you sure you want to delete this user?
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
                        $iduser=$_GET['id'];
                    }
                    if($answer=='No'){
                        header("location:users.php");
                    } 
                }              
                if(!empty($iduser)){
                    $stmt = $db->prepare("delete from user where id =?");
                    $stmt->bind_param('i', $iduser);
                    $response = $stmt->execute();
                    echo'<h2 class="h2_sure"> User deleted';
                    echo'<a class="admingoback" href="users.php"> Go back to user page</a></h2>';
                }            
            ?>
        </div>
        </main>
        <?php 
            include("footer.php"); 
        ?>
    </body>
    
</html>


