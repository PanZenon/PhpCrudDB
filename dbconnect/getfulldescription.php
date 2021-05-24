<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get full description</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
</head>
<body>
    <container class="listUsers list">
        <h2>Users List</h2>
        <div class="user elem fullDesc">
            <div class="id">Id</div>
            <div class="surname">Surname</div>
            <div class="position">Position</div>
            <div class="salary">Salary <?php 
            if(isset($_GET["sort"])){
              if($_GET["sort"] == "true"){
                echo'<a href="index.php?sort=false"><i class="fas fa-sort"></i></a>';
              }
              else{
                echo'<a href="index.php?sort=true"><i class="fas fa-sort"></i></a>';
              }
            }
            else{
              echo'<a href="index.php?sort=true"><i class="fas fa-sort"></i></a>';
            }
            ?></div>
            <div class="delete">Edit</div>
            <div class="edit">Delete</div>
            <div class="Tasks">Tasks</div>
        </div>
    <?php
    include 'dbconnect.php';
    include 'functions.php';
    $sort = $_GET["sort"];
    $Id = $_GET['id'];

    $sql = "Select * from users inner join positions on users.Position = positions.Position where users.Id = {$Id}";

    $result = $conn->query(addSort($sql, $sort));
    while($row = $result->fetch_assoc()) {
      echo "<div class='user elem fullDesc'>
          <div class='id'>{$row['Id']}</div>
          <div class='surname'>{$row['Surname']}</div>
          <div class='position'><a href='index.php?users={$row['Position']}'>{$row['Position']}</a></div>
          <div class='salary'>{$row['Salary']}</div>
          <div class='edit'><a href='edit.php?id={$row['Id']}&surname={$row['Surname']}&position={$row['Position']}&salary={$row['Salary']}&sort={$sort}'><i class='fas fa-edit'></i></a></div>
          <div class='delete'><a href='delete.php?id={$row['Id']}&sort={$sort}'><i class='fas fa-times'></i></a></div>
          <div class='getFullDescription'>{$row['Tasks']}</div>
        </div>";
    }
    
    echo '<div class="option backListPositions"><i class="fas fa-undo-alt"></i><a href="index.php?sort='.$sort.'">Back</a></div></container>';
    ?>
</body>
</html>