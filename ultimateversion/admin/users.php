<html>
    <body>
        <?php 
            include ("../config.php");
            include("header.php");   
        ?>
        <main>
            <h2 class="admin-deleteuser-h2">
                Delete Users
            </h2>
            <div style="padding: 22px;">
                <?php 
                    $query = "select id,username,password from user";
                    $stmt = $db->prepare($query);
                    $stmt->bind_result($id, $user,$pass);
                    $stmt->execute();
                    echo '<table class="admin-usertable" cellpadding="6">';
                    while ($stmt->fetch()) {
                        echo "<tr>";
                        echo "<td> $user </td>";
                        echo '<td class="admin-deleteuser" ><a href="delete.php?id=' . urlencode($id) . '"> Delete </a></td>';
                        echo "</tr>";
                    }  
                    echo "</table";       
                ?>
            </div>
		</main>
		
		<?php 
            include("footer.php"); 
        ?>
    </body>
    
</html>
