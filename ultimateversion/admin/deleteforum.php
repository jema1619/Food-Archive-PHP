<html>
    <body>
        <?php
            include("../config.php");
            include("header.php");
        ?> 
        <main>
            <div class="sure_div">
                <h2 class="h2_sure">
                    Are you sure you want to delete this content?
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
                            $idforum=$_GET['id'];}
                        if($answer=='No'){
                            header("location:forum.php");
                        } 
                    }

                    if(!empty($idforum)){
                        $stmt = $db->prepare("DELETE FROM forum WHERE forum_id ='$idforum'");
                        $response = $stmt->execute();
                        $q="DELETE FROM com WHERE forum='$idforum'";
                        $stmtt = $db->prepare($q);
                        $response = $stmtt->execute();
                        echo'<h2 class="h2_sure"> Content deleted';
                        echo'<br>';
                        echo'<a class="admingoback" href="forum.php"> Go to forum page</a>';   
                    }      
                ?>
            </div>
        </main>
        <?php
            include ('footer.php');
        ?>
    </body>
</html>