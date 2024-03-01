<?php
session_start();
include 'connect.php';

if (isset($_GET['compare-submit'])) {
    // Get the current gadget's ID and the selected gadget's IDs from the form
    $currentGadgetID = $_GET['g_id'];
    $selectedGadgetIDs = $_GET['comparison_gadgets'];

    // Fetch the specifications of the current gadget
    $sqlCurrentGadget = "SELECT * FROM gadget_details WHERE g_id=:g_id";
    $stmtCurrentGadget = $pdo->prepare($sqlCurrentGadget);
    $stmtCurrentGadget->bindParam(':g_id', $currentGadgetID);
    $stmtCurrentGadget->execute();
    $currentGadget = $stmtCurrentGadget->fetch(PDO::FETCH_ASSOC);

    // Fetch the specifications of the selected gadgets
    $selectedGadgets = [];
    foreach ($selectedGadgetIDs as $selectedGadgetID) {
        $sqlSelectedGadget = "SELECT * FROM gadget_details WHERE g_id=:g_id";
        $stmtSelectedGadget = $pdo->prepare($sqlSelectedGadget);
        $stmtSelectedGadget->bindParam(':g_id', $selectedGadgetID);
        $stmtSelectedGadget->execute();
        $selectedGadget = $stmtSelectedGadget->fetch(PDO::FETCH_ASSOC);
        $selectedGadgets[] = $selectedGadget;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Add your HTML head content here -->
</head>

<body>
    <!-- Add your HTML body content here to display the specifications -->
    <h1>Comparison</h1>

    <h2>Current Gadget:
        <?php echo $currentGadget['gname']; ?>
    </h2>
    <ul>
        <?php
        $currentSpecifications = explode("\n", $currentGadget['gspecification']);
        foreach ($currentSpecifications as $specification) {
            echo "<li>$specification</li>";
        }
        ?>
    </ul>

    <h2>Selected Gadgets:</h2>
    <?php foreach ($selectedGadgets as $selectedGadget): ?>
        <h3>
            <?php echo $selectedGadget['gname']; ?>
        </h3>
        <ul>
            <?php
            $selectedSpecifications = explode("\n", $selectedGadget['gspecification']);
            foreach ($selectedSpecifications as $specification) {
                echo "<li>$specification</li>";
            }
            ?>
        </ul>
    <?php endforeach; ?>

    <!-- Add your JavaScript and additional HTML content if needed -->
</body>

</html>