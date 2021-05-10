<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

</head>
<body>
    <h1>Edit Element With Id Of <?php echo $_GET['id'];?></h1>
    <?php
    include 'dbconnect.php';
    $id = $_GET['id'];
    $surname = $_GET['surname'];
    $position = $_GET['position'];
    $salary = $_GET['salary'];
    echo"
    <container class='addNewContent'>
    <form method='post'>
    <div>
      Surname:
    <input value='{$surname}' type='text' name='surname'>
    </div>
    <div>
      Position:
    <input value='{$position}' type='text' name='position'>
    </div>
    <div>
      Salary:
    <input value='{$salary}' type='number' name='salary'>
    </div>
    <div>
    <input id='submit' type='submit' name='submit' value='Send'>
    </div>
  </form>";
  if (isset($_POST['submit'])) {
    $surname = $_POST['surname'];
    $position = $_POST['position'];
    $salary = $_POST['salary'];
    var_dump($surname);
    $sql = "UPDATE users Set Surname ='{$surname}', Position='{$position}', Salary={$salary} WHERE Id = {$id}";
    $conn->query($sql);
    header("Location: index.php?sort={$_GET['sort']}");
  }
    ?>
    <a href="index.php"><div class="option mainPage" href='index.php'><i class="fas fa-undo-alt"></i> Back</div></a>
    </container>
</body>
</html>