<?php
    session_start();
    include 'connect.php';
    
    if (!isset($_SESSION['username'])) {
       header('location: home.php');
       exit(); // Ensure that the script stops here if the user is not logged in.
    }

    $gname = $_POST['gname'];
    $gquantity = $_POST['quantity'];
    $amount = $_POST['amount'];
    $username = $_SESSION['username'];
    
    // code to get userid
    $stmt = $pdo->prepare("SELECT * FROM register WHERE uname = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $uid = $stmt->fetch(PDO::FETCH_COLUMN);

    // code to add item in cart
    $sql = "INSERT INTO cart (product_name, user_id, amount, quantity) VALUES (:product_name, :user_id, :amount, :quantity)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':product_name', $gname);
        $stmt->bindParam(':user_id', $uid);
        $stmt->bindParam(':amount', $amount);
        $stmt->bindParam(':quantity', $gquantity);

        if($stmt->execute()){
            header('location: cart.php');
        }
?>