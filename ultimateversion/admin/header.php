<head>
	<title>Admin</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../style.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Grand+Hotel|Lilita+One" rel="stylesheet">
</head>
<header>
	<ul>
        <li>
            <a href="index.php" id="logomenu">FA</a>
        </li>
        <li>
            <a class="<?php echo ($current_page == 'welcome.php') ? 'active' : NULL ?>" href="welcome.php">Home</a>
        </li>
        <li>
            <a class="<?php echo ($current_page == 'deleterecipe.php') ? 'active' : NULL ?>" href="deleterecipe.php">Recipes</a>
        </li>
        <li>
            <a class="<?php echo ($current_page == 'users.php') ? 'active' : NULL ?>" href="users.php">Users</a>
        </li>
        <li>
            <a class="<?php echo ($current_page == 'forum.php') ? 'active' : NULL ?>" href="forum.php">Forum</a>
        </li>
        <li class="signuplink">
            <a class="<?php echo ($current_page == 'logout.php') ? 'active' : NULL ?>" href="logout.php">Log Out</a>
        </li>
    </ul>
    <?php
         session_start();
        if (!isset($_SESSION['username'])) {
            header("location:index.php");
        }
    ?>
</header>