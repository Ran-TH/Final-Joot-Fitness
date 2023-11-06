<?php
    $error = false;
    session_start();
    require_once 'db.php';
   
    if (isset($_POST['signin'])){
        $Username = $_POST['Username'];
        $password = $_POST['password'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $times = $_POST['times'];
        $email = $_POST['email'];
       try{
        $check_data = $conn->prepare("SELECT * FROM members WHERE Username = :Username");
        $check_data->bindParam("Username",$Username);
        $check_data->execute();
        $row = $check_data->fetch(PDO::FETCH_ASSOC);
        echo"in";
             if($check_data->rowCount() > 0){
                echo"<br>";
                echo"row count is working";
                
                if($Username == $row['Username']){
                    echo"<br>";
                    echo"Username checking is working";
                    
                    
                    if($password == $row['Password']){
                        $_SESSION['user_login'] = $row['Username'];
                        header("location:user.php");
                }
                     else{
                        $_SESSION['error'] = 'Password is not correct.';
                        echo"Password is not correct.";
                    } 
            }
                 else{
                    $_SESSION['error'] = 'Username is not correct.';
                    
                } 
           }
            else{
            $_SESSION['error'] = 'You have not registered yet.';
            header("location: members.php");
           } 
  
        }catch(PDOException $e){
            echo $e ->getMessage();
        }
    } 
 
?> 