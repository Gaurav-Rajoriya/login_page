<?php
require 'config.php';
if(!empty($_SESSION["id"])){
    header("Location: welcome.php");
}
if(isset($_POST["submit"])){
    $usernameemail = $_POST["usernameemail"];
    $password = $_POST["password"];
    $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$usernameemail' OR email = '$usernameemail'");
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) > 0){
        if($password == $row["password"]){
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            header("Location: welcome.php");
        }
       else{
        echo
            "<script> alert('Wrong password'); </script>";
       }
    }
    else{
        echo
            "<script> alert('User Not Registerd'); </script>";
    }
}
?>





<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <form action="" method="post" autocomplete=""off>
            <!-- <label for="username">Username:</label> -->
            <input type="text" id="usernameemail" name="usernameemail" placeholder="Enter your username or Email" required value= "">

            <!-- <label for="password">Password:</label> -->
            <input type="password" id="password" name="password" placeholder="Enter your password" required value= "">

            <button type="submit" name="submit">Login</button>
            <h3> <a href="registration.php">Registration</a></h3>
        </form>
    </div>
   
</body>
</html>