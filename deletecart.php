<?php
    session_start();
    include 'connect.php';
    
    if (!isset($_SESSION['username'])) {
       header('location: home.php');
       exit(); // Ensure that the script stops here if the user is not logged in.
    }

    $id = $_GET['id'];
    echo $id;

    $query = "DELETE FROM cart WHERE cart_id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $id);
    if ($stmt->execute()) {
        // header('location: cart.php');
        echo "<script>alert('Item deleted successfully.'); window.location.href = 'cart.php';</script>";
    } else {
        echo "Error deleting user record: " . $stmt->errorInfo()[2];
}
?>