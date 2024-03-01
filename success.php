<?php
     session_start();
     include 'connect.php';
     
     if (!isset($_SESSION['username'])) {
        header('location: home.php');
        exit(); // Ensure that the script stops here if the user is not logged in.
     }

    $status = $_GET['status'];
    $amount = $_GET['amount'];
    
    $username = $_SESSION['username'];
     // code to get userid
     $stmt = $pdo->prepare("SELECT * FROM register WHERE uname = :username");
     $stmt->bindParam(':username', $username);
     $stmt->execute();
     $uid = $stmt->fetch(PDO::FETCH_COLUMN);

     $query = "DELETE FROM cart WHERE user_id = :id";
     $stmt = $pdo->prepare($query);
     $stmt->bindParam(':id', $uid);
     $stmt->execute();

     $affectedRows = $stmt->rowCount();
     if ($affectedRows > 0) {
         echo "Delete successful. $affectedRows row(s) deleted.";
     } else {
         echo "No rows deleted.";
     }




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Payment Completed</h1>

    <?php 
    echo $status;
    echo "<br>" . $amount/100;

     ?>
</body>
</html>