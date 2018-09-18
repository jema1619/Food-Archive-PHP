<head>
	<title>Recipe main</title>
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
            <a class="<?php echo ($current_page == 'index.php' || $current_page == '') ? 'active' : NULL ?>" href="index.php">Home</a>
        </li>
        <li>
            <a class="<?php echo ($current_page == 'recipes.php') ? 'active' : NULL ?>" href="recipes.php">Recipes</a>
        </li>
        <li>
            <a class="<?php echo ($current_page == 'forum.php') ? 'active' : NULL ?>" href="forum.php">Forum</a>
        </li>
        <li>
            <a class="<?php echo ($current_page == 'mypage.php') ? 'active' : NULL ?>" href="mypage.php">My page</a>
        </li>
        <li>
            <a class="<?php echo ($current_page == 'contact.php') ? 'active' : NULL ?>" href="contact.php">Contact</a>
        </li>
        <li class="signuplink">
            <a class="<?php echo ($current_page == 'logout.php') ? 'active' : NULL ?>" href="logout.php">Log Out</a>
        </li>
    </ul>
    <?php
        session_start();
        if (!isset($_SESSION['user'])) {
            header("location:mypage.php");
        }
    ?>
</header>