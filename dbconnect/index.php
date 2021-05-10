<?php
 include 'dbconnect.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
</head>
<body>
    <h1>Users List</h1>
    
    <container class="menu">
        <div class="option addNew">Add new</div>
        <div class="option showList">Show List</div>
        <a target="_blank" href="https://github.com/PanZenon/PhpCrudDB"><div class="option github"><i class="fab fa-github"></i></div></a>
    </container>
    
    <container class="addNewContent hidden">
    <h2>Add new</h2>
    <form method="post">
      <div>
        Surname:
      <input type="text" name="surname">
      </div>
      <div>
        Position:
      <input type="text" name="position">
      </div>
      <div>
        Salary:
      <input type="number" name="salary">
      </div>
      <div>
      <input id='submit' type="submit" name="submit" value="Send">
      </div>
    </form>
    <div class="option backaddNew"><i class="fas fa-undo-alt"></i> Back</div>
    </container>
    
    <container class="list hidden">
        <h2>Users List</h2>
        <div class="user">
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
            <div class="delete">Delete</div>
            <div class="edit">Edit</div>
        </div>
     <?php
    $sort = 'false';
    if (isset($_POST['submit'])) {
        $surname = $_POST['surname'];
        $position = $_POST['position'];
        $salary = $_POST['salary'];
        if(empty($surname) || empty($position) || empty($salary)){
            echo "<script type='text/javascript'>alert('wypełnij wszystkie pola');</script>";
        }
        else{
            header("Location: addnew.php?surname={$surname}&position={$position}&salary={$salary}");
        }
      }
      if(isset($_GET['sort'])){
        $sort = $_GET['sort'];
      }
      $sql = "Select * from users";
      if($sort=='true'){
        $sql = $sql." order by Salary desc";
      }
      $result = $conn->query($sql);
      while($row = $result->fetch_assoc()) {
        echo "<div class='user'>
            <div class='id'>{$row['Id']}</div>
            <div class='surname'>{$row['Surname']}</div>
            <div class='position'>{$row['Position']}</div>
            <div class='salary'>{$row['Salary']}</div>
            <div class='delete'><a href='delete.php?id={$row['Id']}&sort={$sort}'><i class='fas fa-times'></i></a></div>
            <div class='edit'><a href='edit.php?id={$row['Id']}&surname={$row['Surname']}&position={$row['Position']}&salary={$row['Salary']}&sort={$sort}'><i class='fas fa-edit'></i></a></div>
        </div>";
      }
    ?>
      <div class="option backList"><i class="fas fa-undo-alt"></i> Back</div>
      </container>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="main.js"></script>
</body>
</html>