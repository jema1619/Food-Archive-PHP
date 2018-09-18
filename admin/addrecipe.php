<html>
    <body>
        <?php
            include("../config.php");
            include("header.php");
        ?> 

        <?php
            if (isset($_POST['upload'])) {        
                $allowedextensions = array('jpg', 'jpeg', 'gif', 'png', '');
                $extension = strtolower(substr($_FILES['image']['name'], strrpos($_FILES['image']['name'], '.') + 1));
                $error = array();
                if(in_array($extension, $allowedextensions) === false) {
                    $error[] = "Extension is not allowed";
                    echo "<p>Extension is not allowed</p>";
                }
                if($_FILES['image']['size']>10000000) {
                    $error[] = "The file is to big, MAX 10MB";
                    echo '<p>The file is to big, MAX 10MB</p>';
                }
            
                if(empty($error)){
                    $ingredients=$_POST['ingredients'];
                    $ingredients= htmlentities($ingredients);
                    $image = $_FILES['image']['name'];
                    $name = $_POST['name'];
                    $name= htmlentities($name);
                    $name = mysqli_real_escape_string($db, $name);
                    $description = $_POST['description'];
                    $description= htmlentities($description);
                    $time=$_POST['time'];
                    $type=$_POST['type'];
                    $user=$_SESSION['username'];
                    $stmt = $db->prepare("insert into recipe(name,description,ingredients,img,time,type,username) values (?,?,?,?,?,?,?)");
                    $stmt->bind_param('ssssiss',$name,$description,$ingredients, $image,$time,$type,$user);
                    $stmt->execute();
                    (move_uploaded_file($_FILES['image']['tmp_name'], "../img/{$_FILES ['image']['name']}"));
                    header("location:congrats.php");
                }  
            }
        ?>
        <main>
            <div class="content_addrcp">

                <form class="form_rcp" method="POST" action="addrecipe.php" enctype="multipart/form-data">
                    <fieldset>
                        <legend>Add title and choose a category<span class="signup_required" >*</span></legend>
                        <input class="inputtitle_addrcp" type="text" name="name" placeholder="Recipe name" required >           
                        <select name="type" required>
                            <option value="Dessert">Dessert</option>
                            <option value="Appetizer">Appetizer</option>
                            <option value="Main">Main Course</option>
                            <option value="Drinks">Drink</option>
                        </select>
                    </fieldset>

                    <div id="addimgdiv-addrcp">
                        <fieldset><legend>Add an image for your recipe<span class="signup_required" >*</span></legend>
                            <input class="file_addrcp" type="file" name="image" required />
                        </fieldset>

                        <fieldset><legend>Add time for recipe in minutes<span class="signup_required" >*</span></legend>
                            <input class="inputtitle_addrcp" type="number" name="time" required/>  
                        </fieldset>
                    </div>
                   
                    <fieldset>
                        <legend>Ingredients specification:<span class="signup_required" >*</span></legend>
                        <textarea class="inputtext_addrcp" cols="40" rows="4" name="ingredients" placeholder="1 tsp salt..." required></textarea>
                    </fieldset>
                   
                    <fieldset>
                        <legend>Cooking instructions:<span class="signup_required" >*</span></legend>           
                        <textarea class="inputtext_addrcp" cols="40" rows="4" name="description" placeholder="Write here all the steps"required></textarea>
                    </fieldset>
            
                    <div>
                        <button class="submitbtn_addrcp" type="submit" name="upload">ADD RECIPE</button>
                    </div>
                </form>
            </div>
        </main>

        <?php
            include ('footer.php')
        ?>
    </body>
</html>