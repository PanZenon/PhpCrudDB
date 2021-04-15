<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Deleted Element With Id <?php echo $_GET['id']?></h1>
    <?php
    include 'dbconnect.php';
    $id = $_GET['id'];
    $sql = "DELETE FROM users WHERE Id = {$id}";
    $conn->query($sql);
    header("Location: index.php");
    ?>
</body>
</html>