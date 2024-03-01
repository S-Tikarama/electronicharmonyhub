<?php
session_start();
include 'connect.php';
// Function to calculate average rating
function calculateAverageRating($pdo, $gadgetID)
{
    $query = "SELECT AVG(rating) AS average_rating FROM feedback WHERE g_id = :gadgetID";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':gadgetID', $gadgetID);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['average_rating'] ?? 0;
}

function hasUserReviewed($pdo, $gadgetID, $username)
{
    $query = "SELECT COUNT(*) AS review_count FROM feedback WHERE g_id = :gadgetID AND uname = :username";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':gadgetID', $gadgetID);
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['review_count'] > 0;
}


$selectedGadgetDetails = [];

if (isset($_POST['feedback-submit'])) {
    $uname = $_SESSION['username'];
    $feedback = $_POST['feedback'];
    $rating = $_POST['rating'];
    $gadgetID = $_GET['g_id'];

    if (hasUserReviewed($pdo, $gadgetID, $uname)) {
        echo '<script>alert("You have already reviewed this gadget.");</script>';
    } else {
        $sql = "INSERT INTO feedback (uname, feedback, rating, g_id, status) VALUES (:uname, :feedback, :rating, :gadgetID, 'Pending')";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':uname', $uname);
        $stmt->bindParam(':feedback', $feedback);
        $stmt->bindParam(':rating', $rating);
        $stmt->bindParam(':gadgetID', $gadgetID);
        $stmt->execute();
        echo '<script>alert("Feedback submitted successfully.");</script>';
    }
}

if (isset($_GET['g_id'])) {
    $g_id = $_GET['g_id'];

    $sql = "SELECT * FROM gadget_details WHERE g_id=:g_id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':g_id', $g_id);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

if (isset($_POST['compare-submit'])) {
    // Retrieve the selected gadgets for comparison
    $selectedGadgets = $_POST['comparison_gadgets'];

    // Retrieve gadget details for selected gadgets
    foreach ($selectedGadgets as $selectedGadgetID) {
        $sql = "SELECT * FROM gadget_details WHERE g_id=:g_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':g_id', $selectedGadgetID);
        $stmt->execute();
        $selectedGadget = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($selectedGadget) {
            // Check if the selected gadget has the same type as the current gadget
            if ($selectedGadget['type'] == $result[0]['type']) {
                $selectedGadgetDetails[] = $selectedGadget;
            }
        }
    }
}

// Retrieve all gadgets of the same type for the comparison select form
$sql = "SELECT * FROM gadget_details WHERE g_id != :g_id AND type = :type";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':g_id', $g_id);
$stmt->bindParam(':type', $result[0]['type']); // Filter by the type of the current gadget
$stmt->execute();
$comparisonGadgets = $stmt->fetchAll(PDO::FETCH_ASSOC);


// Query to retrieve feedback for the gadget
$sqlFeedback = "SELECT f.*, u.uname FROM feedback f
                JOIN register u ON f.uname = u.uname
                WHERE f.g_id = :gadgetID";
$stmtFeedback = $pdo->prepare($sqlFeedback);
$stmtFeedback->bindParam(':gadgetID', $g_id);
$stmtFeedback->execute();
$feedbackResults = $stmtFeedback->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GadgetSearch</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/site.webmanifest">
    <link rel="mask-icon" href="favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="details.css">
    <style>

    </style>

</head>

<body>
    <?php
    if (count($result) > 0) {
        foreach ($result as $row) {
            ?>

            <header>
                <div class="logo">
                    <a href="user.php"><img src="image/gadget search-logos/logo.png" alt="" /></a>
                </div>
                <div>
                    <ul class="navbar">
                        <li><a href="user.php">Home</a></li>
                        <li><a href="gadget.php">Gadget</a></li>
                        <li><a href="about.php">About Us</a></li>
                    </ul>
                </div>

            </header>

            <main>
                <section class="section1">
                    <?php
                    echo "<img class='st-img' src='image/product/{$row['gimage']}' alt='Gadget Image'>";
                    ?>
                    <div class="title">
                        <h4 class="name" colspan="2">
                            <?php echo $row['gname']; ?>
                        </h4>
                        <h5 class="price">
                            <?php
                            echo "<p class='gprice'>RS: {$row['gprice']} </p>";
                            ?>
                        </h5>
                        <div class="displayed">
                            <?php
                            $averageRating = calculateAverageRating($pdo, $g_id);
                            $rating = round($averageRating * 2) / 2;
                            for ($i = 1; $i <= 5; $i++) {
                                if ($i <= $rating) {
                                    echo '<i class="fas fa-star"></i>';
                                } elseif ($i - 0.5 == $rating) {
                                    echo '<i class="fas fa-star-half-alt"></i>';
                                } else {
                                    echo '<i class="far fa-star"></i>';
                                }
                            }
                            ?>
                            <?php
                            $averageRating = calculateAverageRating($pdo, $g_id);
                            echo number_format($averageRating, 1);
                            ?>
                        </div>
                        <div>
                            <form action="additem.php" method="POST">
                                <!-- <label for="quantity">Quantity</label> -->
                                <input type="text" name="gname" id="gname" value="<?php echo $row['gname'] ?>" hidden>
                                <input type="number" name="amount" id="amount" value="<?php echo $row['gprice'] ?>" hidden>
                                <input type="number" name="quantity" id="quantity" value="1">
                                <input type="submit" class="buy-btn" value="Buy Now">
                            </form>
                        </div>

                    </div>
                </section>
                <div class="discription">
                    <?php
                    $gdis = explode("\n", $row['gdis']);
                    echo "<ul>";
                    foreach ($gdis as $point) {
                        echo "<li class='points' style='font-size: 1.15rem;'>$point</li>";
                    }
                    echo "</ul>";
                    ?>
                </div>
                <div class="images">
                    <?php
                    echo "<img class='gadget-full' src='image/product/{$row['imageone']}' alt='Gadget Image'>";
                    echo "<img class='gadget-small' src='image/product/{$row['imagetwo']}' alt='Gadget Image'>";
                    ?>
                </div>
                <div class="innerlink">
                    <p class="showcomparison"></p>
                    <p class="showfeedback">Feedback</p>
                    <p class="showlink"></p>
                </div>

                <articale id="2ndpage" class="comparison-container">
                   
                </articale>

                <articale id="3rdpage" class="link-container">
                    <table class="elink" border="1">
                        <tr>
                            <th>Buy Here</th>
                        </tr>
                        <tr>
                            <td>
                                <?php
                                if (isset($row['glink']) && !empty($row['glink'])) {
                                    echo '<a href="' . $row['glink'] . '" target="_blank">Buy Now</a>';
                                } else {
                                    echo 'Link not available.';
                                }
                                ?>
                            </td>
                        </tr>
                    </table>
                </articale>



                <articale id="4thpage" class="feedback-container">
                    <!-- Feedback Form -->
                    <form action="" method="POST" class="feedback-link">
                        <div class="feedback-username">
                            <?php echo $_SESSION['username']; ?>
                        </div>
                        <div class="container">
                            <div class="rating">
                                <input type="radio" id="star5" name="rating" value="5" /><label for="star5" class="full"
                                    title="Awesome"></label>
                                <input type="radio" id="star4.5" name="rating" value="4.5" /><label for="star4.5"
                                    class="half"></label>
                                <input type="radio" id="star4" name="rating" value="4" /><label for="star4"
                                    class="full"></label>
                                <input type="radio" id="star3.5" name="rating" value="3.5" /><label for="star3.5"
                                    class="half"></label>
                                <input type="radio" id="star3" name="rating" value="3" /><label for="star3"
                                    class="full"></label>
                                <input type="radio" id="star2.5" name="rating" value="2.5" /><label for="star2.5"
                                    class="half"></label>
                                <input type="radio" id="star2" name="rating" value="2" /><label for="star2"
                                    class="full"></label>
                                <input type="radio" id="star1.5" name="rating" value="1.5" /><label for="star1.5"
                                    class="half"></label>
                                <input type="radio" id="star1" name="rating" value="1" /><label for="star1"
                                    class="full"></label>
                                <input type="radio" id="star0.5" name="rating" value="0.5" /><label for="star0.5"
                                    class="half"></label>
                            </div>
                        </div>
                        <textarea name="feedback" id="" cols="20" rows="3" class="textarea" required></textarea>
                        <div class="feedback" id="submit-btn">
                            <input type="submit" name="feedback-submit" id="feedback-btn" value="Submit" />
                        </div>
                    </form>
                    <div class="submitted-feedback">
                        <h2>Reviews</h2>
                        <ul>
                            <?php
                            foreach ($feedbackResults as $feedback) {
                                if ($feedback['status'] === 'Approved') {
                                    echo '<li>';
                                    echo '<strong>Username:</strong> ' . $feedback['uname'] . '<br>';
                                    echo '<strong>Rating:</strong> ' . $feedback['rating'] . '<br>';
                                    echo '<strong>Feedback:</strong> ' . $feedback['feedback'];
                                    echo '</li>';
                                }
                            }
                            ?>
                        </ul>
                    </div>

                </articale>
            </main>
            <?php
        }
    }
    ?>
    <div class="top"><a href="#">top</a></div>

    <!-- Your JavaScript code here -->


    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const showComparison = document.querySelector(".showcomparison");
            const showLink = document.querySelector(".showlink");
            const showFeedback = document.querySelector(".showfeedback");


            const comparisonContainer = document.querySelector(".comparison-container");
            const linkContainer = document.querySelector(".link-container");
            const feedbackContainer = document.querySelector(".feedback-container");

            linkContainer.style.display = "none";
            feedbackContainer.style.display = "none";

            showComparison.addEventListener("click", function () {
                linkContainer.style.display = "none";
                feedbackContainer.style.display = "none";
                comparisonContainer.style.display = "block";
            });

            showLink.addEventListener("click", function () {
                linkContainer.style.display = "block";
                feedbackContainer.style.display = "none";
                comparisonContainer.style.display = "none";
            });

            showFeedback.addEventListener("click", function () {
                linkContainer.style.display = "none";
                feedbackContainer.style.display = "block";
                comparisonContainer.style.display = "none";
            });
        });
    </script>
</body>

</html>