<?php
session_start();
require_once 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Joot fitness|members</title>
    <link rel="stylesheet" href="style_memberpage.css">
    
<body>
 <div class="center">
    <h1>Sign In</h1>
    <form action="signin_db.php" method="post">
       
        <div class="txt_field">
            <label for="Username">Username</label>
            <input type="text" name="Username" required>
        </div>
        <div class="txt_field">
            <label for="password">Password</label>
            <input type="password" name="password" required>
        </div>
        <input type="Submit" name="signin">
        <div class="guest">
            <p>Continue as a <a href="#">Guest.</a></p>
        </div>
        </form>    
    </div>
    
    
</body>
</html>
