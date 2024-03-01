<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $feedback_id = $_POST['feedback_id'];
    $status = $_POST['status'];

    $updateQuery = $pdo->prepare("UPDATE feedback SET status = :newStatus WHERE feedback_id = :feedback_id");
    $updateQuery->bindParam(':newStatus', $status);
    $updateQuery->bindParam(':feedback_id', $feedback_id);
    $updateQuery->execute();
}
?>