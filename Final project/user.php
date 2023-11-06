<?php
session_start();
require_once 'db.php';
if (!isset($_SESSION['user_login'])) {
    header('location: signin.php');
    exit; // Make sure to exit after a header redirect
}

if (isset($_SESSION['user_login'])) {
    $username = $_SESSION['user_login'];
    try {
        $stmt = $conn->prepare("SELECT * FROM members WHERE Username = :username");
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

    
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
</head>
<body>
    <div>
       <p>Welcome <strong><?php echo $row['Firstname']?></strong></p>
    </div>
</body>
</html>
