<?php
require 'config.php';
if(!empty($_SESSION["id"])){
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE id = $id ");
    $row = mysqli_fetch_assoc($result);
}
else{
    header("Location: login.php");
}
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <h1>WELCOME <?php echo $row["name"]; ?> </h1>
    <a href="logout.php">Logout</a>
</body>
</html>

