<?php
$user = 'root';
$password = '';
$db = 'users';
 
$conn = new mysqli('localhost',$user, $password, $db) or die("Can't connect to db");
?>
