<html>
    <body>
        <?php
            include("../config.php");
            include("header.php");
        ?> 
            
        <?php
            if($_GET['id']){
                $id = $_GET['id'];
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
            
                <div class="icon_containter_onercp">
                    <img class="icon_img_onercp" src="../img/clock-icon.png">
                    <span class="icon_text_onercp"> <?php echo "$time minutes"; ?> </span> <br>
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
                include ('footer.php');
            ?>
        </main>

    </body>
</html>