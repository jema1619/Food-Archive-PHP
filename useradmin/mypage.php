<html>
    <body>
        <?php
            include("../config.php");
            include("header.php");
        ?> 
        <div class="background"> 
            <figure id="myp-maincontainer">
                <div class="mp-four"> 
                    <a class="mp-link" href="myrecipes.php">My Recipes</a>
                </div>
                <div class="mp-four">
                    <a class="mp-link" href="myfavorites.php">My favorites</a>
                </div>
                <div class="mp-four">
                    <a class="mp-link" href="addrecipe.php">Add recipe</a>
                </div>
                <div class="mp-four">
                    <a class="mp-link" href="deleterecipe.php">Delete Recipe </a>
                </div>
            </figure>
        </div>
        <?php
            include ('footer.php');
        ?>
    </body>
</html>


