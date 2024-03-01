<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gadget_search";

// create a PDO instance
try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // connection successful
    // echo "Connected successfully";
} catch (PDOException $e) {
    // connection failed
    echo "Connection failed: " . $e->getMessage();
}
?>