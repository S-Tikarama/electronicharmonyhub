<?php
include 'connect.php';

if (isset($_GET['id'])) {
    $Id = $_GET['id'];
    $query = "DELETE FROM feedback WHERE feedback_id  = :Id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':Id', $Id);
    if ($stmt->execute()) {
        echo "<script>alert('Feedback deleted successfully.'); window.location.href = 'feedback.php';</script>";
        exit(); // Add exit() to prevent further execution
    } else {
        echo "Error deleting feedback record: " . $stmt->errorInfo()[2];
        exit(); // Add exit() to prevent further execution
    }
}
?>