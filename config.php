<?php

$url = $_SERVER['REQUEST_URI'];//variable used for the current page link
$strings = explode('/', $url);
$current_page = end($strings);

//variables used to connect to the database
$dbname = 'food';
$dbuser = 'root';
$dbpass = '';
$dbserver = 'localhost';

$db = mysqli_connect($dbserver, $dbuser, $dbpass, $dbname);
ini_set('session.cookie_httponly', true);
$n=false;
?>
