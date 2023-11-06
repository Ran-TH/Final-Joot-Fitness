<?php
    $error = false;
    session_start();
    require_once 'db.php';
   
    if (isset($_POST['Submit'])){
        $Username = $_POST['Username'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $password = $_POST['password'];
        $c_password = $_POST['c_password'];
        $email = $_POST['email'];
        $times = $_POST['times'];
        $Course = $_POST['Course'];
        echo"submit working";
        if ($password != $c_password){
            $_SESSION['error'] = "Password Difference.";
            header("location: members.php");
            $error = true;
        }
            if (!isset($_SESSION['error'])){
            $stmt = $conn->prepare("INSERT INTO members(Username,Firstname,Lastname,Password,email,Course,Times)
                VALUES('$Username','$firstname','$lastname','$password','$email','$times','$Course')");
                echo"working";
            $stmt->execute(); 
            
            header("location:signin.php");
            }
    }
?>