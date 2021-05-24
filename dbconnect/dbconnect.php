<?php
$user = 'root';
$password = '';
$db = 'users';

$conn = new mysqli('localhost',$user, $password);

if (!mysqli_select_db($conn,'users')){
    $sql = "CREATE DATABASE ".$db;
    $conn->query($sql);
    $conn->close();
    
    $conn = new mysqli('localhost',$user, $password,$db);
    $sql = 'CREATE TABLE users (Id INT NOT NULL AUTO_INCREMENT,Surname TEXT NOT NULL,Position TEXT NOT NULL, Salary INT NOT NULL,PRIMARY KEY (Id));';
    $conn->query($sql);

    $sql = 'CREATE TABLE `positions` (
        `Id` int(11) NOT NULL,
        `Position` text NOT NULL,
        `Tasks` text NOT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;';
    $conn->query($sql);

    $sql = "INSERT INTO `positions` (`Id`, `Position`, `Tasks`) VALUES
    (1, 'worker', 'simple tasks make coffe for boss'),
    (2, 'admin', 'manages everything');";
    $conn->query($sql);
} 