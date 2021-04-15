<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add new</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Added New Elem</h1>
    <?php
        include 'dbconnect.php';
        $surname = $_GET['surname'];
        $position = $_GET['position'];
        $salary = $_GET['salary'];
        $sql = "INSERT INTO users (Surname, Position,Salary)
        VALUES ('{$surname}', '{$position}', {$salary})";
        $conn->query($sql);
        header("Location: index.php");
        ?>
</body>
</html>