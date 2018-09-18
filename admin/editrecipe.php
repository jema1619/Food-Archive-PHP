<!DOCTYPE html>
<html>
    <body>
        <?php
            include("../config.php");
            include("header.php");
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $query="SELECT name, description, ingredients, img,time,type FROM recipe where id='$id'";
                $stmt = $db->prepare($query);
                $stmt->bind_result($name, $description,$ingredients, $image, $time,$type); 
                $stmt->execute();
                $stmt->store_result();
            }
        ?> 
        <main>
            <div class="content_addrcp">
                <form class="form_rcp" method="POST" enctype="multipart/form-data">
                    <fieldset>
                        <legend>Add title and choose a category<span class="signup_required" >*</span></legend> <?php  $stmt->fetch();?>
                        <input class="inputtitle_addrcp" type="text" name="name" value="<?php echo $name;  ?>  ">           
                        <select name="type">
                            <option <?php if($type=='Dessert'){ echo "selected='selected'"; }  ?>value="Dessert">Dessert</option>
                            <option <?php if($type=='Drinks'){ echo "selected='selected'"; }  ?>value="Drinks">Drinks</option>
                            <option <?php if($type=='Appetizer'){ echo "selected='selected'"; }  ?>value="Appetizer">Appetizer</option>
                            <option <?php if($type=='Main'){ echo "selected='selected'"; } ?>value="Main">Main Course</option>
                        </select>
                    </fieldset>
                    
                    <div id="addimgdiv-addrcp">
                        <fieldset><legend>Add an image for your recipe<span class="signup_required" >*</span></legend>
                            <input class="file_addrcp" type="file" name="image" value="<?php echo $image; ?>"/>
                        </fieldset>

                        <fieldset><legend>Add time for recipe in minutes<span class="signup_required" >*</span></legend>
                            <input class="inputtitle_addrcp" type="number" name="time" value="<?php echo $time;  ?>  "/>  
                        </fieldset>
                    </div>
                    
                    <fieldset>
                        <legend>Ingredients specification:<span class="signup_required" >*</span></legend>
                        <textarea class="inputtext_addrcp" cols="40" rows="4" name="ingredients" placeholder="1 tsp salt..."><?php echo $ingredients; ?></textarea>
                    </fieldset>
                    
                    <fieldset>
                        <legend>Cooking instructions:<span class="signup_required" >*</span></legend>           
                        <textarea class="inputtext_addrcp" cols="40" rows="4" name="description" placeholder="Write here all the steps"><?php echo $description; ?></textarea>
                    </fieldset>
                    
            		<div>
                        <button class="submitbtn_addrcp" type="submit" name="upload">EDIT RECIPE</button>
            		</div>
            	</form>
                <?php
                    if (isset($_POST['upload'])) {        
                        $allowedextensions = array('jpg', 'jpeg', 'gif', 'png', '');
                        $extension = strtolower(substr($_FILES['image']['name'], strrpos($_FILES['image']['name'], '.') + 1));
                        $error = array();
                        if(in_array($extension, $allowedextensions) === false) {
                            $error[] = "Extension is not allowed";
                            echo "Extension is not allowed";
                        }
                        if($_FILES['image']['size']>10000000) {
                            $error[] = "The file is to big, MAX 10MB";
                            echo 'The file is to big, MAX 10MB';
                        }
                        if(empty($error)){
                            $ingredients=trim($_POST['ingredients']);
                            $ingredients= htmlentities($ingredients);
                            $ingredients = mysqli_real_escape_string($db, $ingredients);
                            $i= $_FILES['image']['name'];
                            if($i!==''){
                                $image = $i;
                                $n=true;
                            }
                            $name = trim($_POST['name']);
                            $name= htmlentities($name);
                            $name = mysqli_real_escape_string($db, $name);
                            $description = trim($_POST['description']);
                            $description= htmlentities($description);
                            $description = mysqli_real_escape_string($db, $description);
                            $t=$_POST['time'];
                            if($t!==0){
                                $time=$t;
                            }
                            $type=$_POST['type'];
                            $query="UPDATE recipe SET name='$name',description='$description', ingredients='$ingredients', img='$image',time='$time',type='$type' where id='$id'";
                            if (mysqli_query($db, $query)) {
                                header("location:congrats.php");
                            } else{
                                echo "<p>Error updating recipe: <p>" . mysqli_error($db);
                            }
                            if($n==true){
                            (move_uploaded_file($_FILES['image']['tmp_name'], "../img/{$_FILES ['image']['name']}"));
                            }
                        }
                    }
                    mysqli_close($db);
                ?>
            </div>
        </main>
        <?php
            include ('footer.php')
        ?>
    </body>
</html>
