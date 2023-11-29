<?php
require 'config.php';
if(!empty($_SESSION["id"])){
    header("Location: welcome.php");
}
if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];
    $duplicate = mysqli_query($conn,"SELECT * FROM tb_user WHERE username = '$username' OR email = '$email' ");
    if(mysqli_num_rows($duplicate) > 0){
        echo
        "<script> alert('Username or Email Has Already Tekan'); </script>";
    }
    else{
        if($password == $confirmPassword){
            $query = "INSERT INTO tb_user VALUES('','$name','$username','$email','$password')";
            mysqli_query($conn,$query);
            echo
        "<script> alert('Registration Successful'); </script>";
        }
        else{
            echo
        "<script> alert('Password Dose Not Match'); </script>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Sign Up</h1>
        <form action="#" method="post" autocomplete="0ff">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter your name" required value= "">
           
            <label for="name">Username:</label>
            <input type="text" id="username" name="username" placeholder="Enter your Username" required value= "" >

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter your email address" required value= "">

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required value= "">

            <label for="confirmPassword">Confirm Password:</label>
            <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm your password" required value= "">

            <button type="submit" name="submit">Sign Up</button>


           <h3> <a href="login.php">Login</a></h3>

        </form>
    </div>
      
    
  
</body>
</html>