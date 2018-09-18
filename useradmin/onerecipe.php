<html>
    <body>
        <script type="text/javascript">
            function rating(){
                var rating;
                rating=0;
                var star1;
                var star2; 
                var star3;
                var star4;
                var star5;
                star1=document.getElementById('star1');
                star2=document.getElementById('star2');
                star3=document.getElementById('star3');
                star4=document.getElementById('star4');
                star5=document.getElementById('star5');

                if(star1.checked){
                    rating=1;
                }
                if(star2.checked){
                    rating=2;
                }
                if(star3.checked){
                    rating=3;
                }
                if(star4.checked){
                    rating=4;
                }
                if(star5.checked){
                    rating=5;
                }
                if(rating!==0){
                    document.cookie = "rating="+rating;
                    location.reload();
                }
                
            }
            window.onunload = deleteMyCookie;
            function deleteMyCookie(){
                document.cookie='rating=;expires=Thu, 01-Jan-70 00:00:01 GMT;';}
        </script>

        <?php
            include("../config.php");
            include("header.php");
        ?> 
            
        <?php
            if($_GET['id']){
                $id = $_GET['id'];
                $average=0;
                $count=0;
                $sstmt = $db->prepare("SELECT rating from rating where recipeid='$id'");
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
                $average=round($average);
                $sql="SELECT id, name, description, img, time, ingredients FROM recipe where id='$id'";
                $stmt = $db->prepare($sql);
                $stmt->bind_result($id, $name, $description, $image, $time, $ingredients);
                $stmt->execute();
                $stmt->store_result();
                while ($stmt->fetch()) {
        ?>
        <main> 
            <div class="maincontainer_one">
                <h4 class="h4_onercp"> 
                    <?php echo $name; ?> 
                </h4>
                <div class="stars">
                    <form class="rating" method="post">
                        <input id="star5" type="radio" name="star" value="star5" onclick="rating()"  <?php if ($average == '5') echo "checked"; ?>  />
                        <label class="ratingstar" for="star5">&#9733</label>
                        <input id="star4" type="radio" name="star" value="star4" onclick="rating()" <?php if ($average == '4') echo "checked"; ?>/>
                        <label class="ratingstar" for="star4">&#9733</label>
                        <input id="star3" type="radio" name="star" value="star3" onclick="rating()" <?php if ($average == '3') echo "checked"; ?>/>
                        <label class="ratingstar" for="star3">&#9733</label>
                        <input id="star2" type="radio" name="star" value="star2" onclick="rating()" <?php if ($average == '2') echo "checked"; ?>/>
                        <label class="ratingstar" for="star2">&#9733</label>
                        <input id="star1" type="radio" name="star" value="star1" onclick="rating()" <?php if ($average == '1') echo "checked"; ?>/>
                        <label class="ratingstar" for="star1">&#9733</label>
                    </form>
                 </div>
            
                <div class="icon_containter_onercp">
                    <img class="icon_img_onercp" src="../img/clock-icon.png">
                    <span class="icon_text_onercp"> <?php echo "$time minutes"; ?> </span> <br>
                    <img class="icon_img_onercp" src="../img/heart.png">
                    <?php
                        $user=$_SESSION['user'];
                        $query1 = "SELECT * FROM favorites where username='$user' and recipeid='$id'";
                        $resultt=$db->query($query1);
                        if($resultt->num_rows > 0){
                        echo'<span class="icon_text_onercp"><a class="favlink-onercp" href="unfavorite.php?id='. urlencode($id) .'"> Delete from favorites </a><span>';
                        }else{   
                            echo'<span class="icon_text_onercp"><a class="favlink-onercp" href="myfavorites.php?id='. urlencode($id) .'"> Add to favorites </a></span>';
                        }
                    ?>        
                </div>

                <div class="div_img_onercp">
                    <aside class="imgaside_onercp">
                        <img class="bigimg_onercp" src='../img/<?php echo $image; ?>'>
                    </aside>
                    <article class="article_onercp">
                        <div class="ingredients-onercp"><p> <?php echo $ingredients; ?></p></div>
                        <div class="description-onercp"><p> <?php echo $description; ?> </p></div>
                    </article>
                </div>
            </div>
            
          
            <?php
                }}
                $user=$_SESSION['user'];
                $check=isset($_COOKIE['rating']);
                if($check==false){
                    $vote=0;
                }else{
                    $vote = $_COOKIE['rating'];
                    $sqll="SELECT rating FROM rating where username='$user' and recipeid='$id'";
                    $sttmt = $db->prepare($sqll);
                    $sttmt->bind_result($rating);
                    $sttmt->execute();
                    $sttmt->store_result();
                    $amount=0;
                    while($sttmt->fetch()){
                        $amount+=$rating;
                    }
                    if($amount==0){
                        $qquery="insert into rating values(null,'$id','$vote','$user')";
                        $stmmt = $db->prepare($qquery);
                        $stmmt->execute(); 
                    }else{    
                        if($amount!==$vote && $vote!==0){
                            $query33="update rating SET rating='$vote' where recipeid='$id' and username='$user'";
                            $stmt33 = $db->prepare($query33);
                            $stmt33->execute();
                        }
                    }
                }
                include ('footer.php');
            ?>
        </main>

    </body>
</html>