<?php
session_start();
include 'connect.php';

if (!isset($_SESSION['username'])) {
   header('location: home.php');
   exit(); // Ensure that the script stops here if the user is not logged in.
}

$g_id;
$i = 0;
$searchValue;
$count = isset($_GET['count']) ? (int) $_GET['count'] : 0; // Ensure that $count is an integer.
$username = $_SESSION['username'];

$stmt = $pdo->prepare("SELECT id FROM register WHERE uname = :username");
$stmt->bindParam(':username', $username);
$stmt->execute();
$uid = $stmt->fetch(PDO::FETCH_COLUMN);

function calculateAverageRating($pdo, $gadgetID)
{
   $query = "SELECT AVG(rating) AS average_rating FROM feedback WHERE g_id = :gadgetID";
   $stmt = $pdo->prepare($query);
   $stmt->bindParam(':gadgetID', $gadgetID);
   $stmt->execute();
   $result = $stmt->fetch(PDO::FETCH_ASSOC);
   return isset($result['average_rating']) ? $result['average_rating'] : 0;
}

$value = array(); // Initialize the $value array.

do {
   $g_id = isset($_GET[$i]) ? (int) $_GET[$i] : null; // Ensure that $g_id is an integer.

   if ($g_id !== null) {
      $stmt = $pdo->prepare("SELECT * FROM gadget_details WHERE g_id = :g_id");
      $stmt->bindParam(':g_id', $g_id);

      $stmt->execute();
      $value[$i] = $stmt->fetchAll(PDO::FETCH_ASSOC);
      $searchValue = true;
   } else {
      $searchValue = false;
   }
   $i++;
} while ($i < $count);

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

   <meta name="msapplication-TileColor" content="#da532c">
   <meta name="theme-color" content="#ffffff">

   <link rel="preconnect" href="https://fonts.googleapis.com" />
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
   <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
   <link rel="stylesheet" href="style1.css" />
   <link rel="stylesheet" href="gadget.css">

   <title>Electronic</title>
   <script src="javascript.js" defer></script>

</head>

<body>
   <?php
   if ($searchValue) { ?>
      <ul class="navbar">
         <form action="search.php" method="post">
            <input type="text" name="search" class="search-bars" placeholder="Search . . . " id="search" /><i
               class="fa-solid fa-magnifying-glass"></i>
         </form>
      </ul>
      <a class="back-arrow" href="user.php">&LeftArrow;</a>
      <h2 class="result">Found results.</h2>
      <?php
      echo '<div class="searchcontainer">';
      foreach ($value as $item) {
         echo '<a href="gadgetdetails.php?g_id=' . $item[0]['g_id'] . '" class="search-item">';
         echo "<img class='g-img' src='image/product/{$item[0]['gimage']}' alt='Gadget Image'>";
         echo '<div class="gadget-section">';
         echo '<div class="gadget-name">' . $item[0]['gname'] . '</div>';
         echo '<div class="gadget-price">Rs:' . $item[0]['gprice'] . '</div>';
         echo '<div class="gadget-rating">';
         $averageRating = calculateAverageRating($pdo, $item[0]['g_id']); // Corrected variable name here.
         $rating = round($averageRating * 2) / 2; // Round to nearest half
         for ($i = 1; $i <= 5; $i++) {
            if ($i <= $rating) {
               echo '<i class="fas fa-star" style="color: gold;"></i>';
            } elseif ($i - 0.5 == $rating) {
               echo '<i class="fas fa-star-half-alt" style="color: gold;"></i>';
            } else {
               echo '<i class="far fa-star" style="color: gold;"></i>';
            }
         }
         echo ' ' . number_format($averageRating, 1);
         echo '</div>';
         echo '</div>';
         echo '</a>';
      }
      echo '</div>';
      ?>
      <?php
   } else { ?>
      <header>
         <div>
            <a class="logo" href="user.php"><img src="image/gadget search-logos/logo.png" alt=""  style="width: 100px; margin-left: 50px"/></a>
         </div>
         <ul class="navbar">
            <li><a class="active" href="user.php">Home</a></li>
            <li><a href="gadget.php">Electronics</a></li>
            <li><a href="about.php">About Us</a></li>

            <form action="search.php" method="post">
               <input type="text" name="search" class="search-bar" placeholder="Search . . . " id="search" />
            
            </form>
         </ul>
         <button id="modal-btn" class="login-btn"><i class="fa-solid fa-user"></i></button>

         <div id="my-modal" class="modal">
            <form action="" method="POST" class="login-form">
               <i id="xmark" class="fa-solid fa-xmark fa-lg"></i>
               <div id="username" class="container">
                  <?php echo $_SESSION['username'] ?>
               </div>
               <div class="user-fun">
                  <div class="update-user">
                     <a href="update.php?id=<?php echo $uid; ?>">update</<i class="fa-solid fa-right-to-bracket"></i>a>
                  </div>
                  <div class="logout">
                     <a href="logout.php">logout</a>
                  </div>
               </div>
            </form>
         </div>
      </header>
      <main>
         <section id="hero">
            <img src="image/backgrounds/My project.png" alt="" class="background1" />
            <div class="cont-text">
               <!-- <h3>Your search is here</h3> -->
               <h1>Electronic Harmony Hub</h1>
               <p>Make your life easy & happy</p>
            </div>
         </section>
         <section id="slider">
            <h2 class="product-category">Best Electrons Devices</Details></h2>
            <div class="product-details">
               <div class="pro-container">
                  <?php
                  $sql = "SELECT * FROM gadget_details WHERE category = 'deals' limit 6";
                  $stmt = $pdo->query($sql);

                  if ($stmt->rowCount() > 0) {
                     while ($row = $stmt->fetch()) {
                        echo '<a href="gadgetdetails.php?g_id=' . $row['g_id'] . '" class="slider-card">';
                        echo "<img class='pro-img' src='image/product/{$row['gimage']}' alt='Gadget Image'>";
                        echo '<div class="gadget-section">';
                        echo '<div class="pro-name">' . $row['gname'] . '</div>';
                        echo '<div class="pro-price">Rs:' . $row['gprice'] . '</div>';
                        echo '<div class="gadget-rating">';
                        $averageRating = calculateAverageRating($pdo, $row['g_id']); // Corrected variable name here.
                        $rating = round($averageRating * 2) / 2; // Round to nearest half
                        for ($i = 1; $i <= 5; $i++) {
                           if ($i <= $rating) {
                              echo '<i class="fas fa-star" style="color: gold;"></i>';
                           } elseif ($i - 0.5 == $rating) {
                              echo '<i class="fas fa-star-half-alt" style="color: gold;"></i>';
                           } else {
                              echo '<i class="far fa-star" style="color: gold;"></i>';
                           }
                        }
                        echo ' ' . number_format($averageRating, 1);
                        echo '</div>';
                        echo '</div>';
                        echo '</a>';
                     }
                  } else {
                     echo "No deals found.";
                  }
                  ?>
               </div>
            </div>
         </section>
         <section id="newarival">
            <h2 class="product-category">latest gadgets</h2>
            <div class="latest-container">
               <?php
               $sql = "SELECT * FROM gadget_details order by g_id desc limit 4";
               $stmt = $pdo->query($sql);

               if ($stmt->rowCount() > 0) {

                  while ($row = $stmt->fetch()) {
                     echo '<a href="gadgetdetails.php?g_id=' . $row['g_id'] . '" class="g-new">';

                     echo "<img class='g-img' src='image/product/{$row['gimage']}' alt='Gadget Image'>";

                     echo '<div class="gadget-section">';
                     echo '<div class="gadget-name">' . $row['gname'] . '</div>';
                     echo '<div class="gadget-price">Rs:' . $row['gprice'] . '</div>';
                     echo '<div class="gadget-rating">';
                     $averageRating = calculateAverageRating($pdo, $row['g_id']); // Corrected variable name here.
                     $rating = round($averageRating * 2) / 2; // Round to nearest half
                     for ($i = 1; $i <= 5; $i++) {
                        if ($i <= $rating) {
                           echo '<i class="fas fa-star" style="color: gold;"></i>';
                        } elseif ($i - 0.5 == $rating) {
                           echo '<i class="fas fa-star-half-alt" style="color: gold;"></i>';
                        } else {
                           echo '<i class="far fa-star" style="color: gold;"></i>';
                        }
                     }
                     echo ' ' . number_format($averageRating, 1);
                     echo '</div>';
                     echo '</div>';
                     echo '</a>';
                  }
               } else {
                  echo "No courses found.";
               }
               ?>
            </div>
         </section>
              </main>
      <a class="top" href="#">top</a>
      <footer>
         <div class="row">
            <div class="coln">
               <h3>contact</h3>
               <ul>
                  <li>
                     <a href="about.php"><i class="fa-solid fa-location-dot"></i><span class="content">Balkumari
                           ,lalitpur</span></a>
                  </li>
                  <li><i class="fa-solid fa-phone"></i><span class="content">01-XXXXX ,(+977)98XXXXXXXX</span></li>
                  <li><i class="fa-solid fa-envelope"></i><span class="content">electronichub@gmail.com</span></li>
               </ul>
            </div>
            <div class="coln">
               <h3>About</h3>
               <ul>
                  <li><a href="about.php">About us</a></li>
                  <li><a href="#">Term & Condition</a></li>
                  <i class="fa-regular fa-copyright"></i>opyright
               </ul>
            </div>
            <div class="coln">
               <h3>follow us</h3>
               <div>
                  <a href="https://www.facebook.com/profile.php?id=100092486893685" target="_blank" class="icon"><i
                        class="fa-brands fa-facebook-f"></i></a>
                  <a href="" target="_blank" class="icon"><i class="fa-brands fa-instagram"></i></a>
                  <a href="" target="_blank" class="icon"><i class="fa-brands fa-twitter"></i></a>
               </div>
            </div>
         </div>
         
      </footer>
   <?php } ?>

   <script>
      function showDeviceType(type) {
         window.location.href = "category.php?type=" + type;
      }

   </script>
</body>

</html>