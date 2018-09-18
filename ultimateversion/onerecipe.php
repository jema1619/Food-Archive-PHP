<html>
    <body>
       
        <?php
            include("config.php");
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
                            <label class="ratingstar hover" for="star5">&#9733</label>
                            <input id="star4" type="radio" name="star" value="star4" onclick="rating()" <?php if ($average == '4') echo "checked"; ?>/>
                            <label class="ratingstar hover" for="star4">&#9733</label>
                            <input id="star3" type="radio" name="star" value="star3" onclick="rating()" <?php if ($average == '3') echo "checked"; ?>/>
                            <label class="ratingstar hover" for="star3">&#9733</label>
                            <input id="star2" type="radio" name="star" value="star2" onclick="rating()" <?php if ($average == '2') echo "checked"; ?>/>
                            <label class="ratingstar hover" for="star2">&#9733</label>
                            <input id="star1" type="radio" name="star" value="star1" onclick="rating()" <?php if ($average == '1') echo "checked"; ?>/>
                            <label class="hover ratingstar" for="star1">&#9733</label>
                        </form>
                     </div>
                
                    <div class="icon_containter_onercp">
                            <img class="icon_img_onercp" src="img/clock-icon.png">
                        <span class="icon_text_onercp"> <?php echo "$time minutes"; ?> </span> <br>
                    </div>
                </div>
            
                <div class="div_img_onercp">
                    <aside class="imgaside_onercp">
                        <img class="bigimg_onercp" src='img/<?php echo $image; ?>'>
                    </aside>
                    <article class="article_onercp">
                        <div class="ingredients-onercp"><p> <?php echo $ingredients; ?></p></div>
                        <div class="description-onercp"><p> <?php echo $description; ?> </p></div>
                    </article>
                </div>
            </main>
            
        <?php
            }}
            include ('footer.php');
        ?>

    </body>
</html>