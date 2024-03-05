<?php
session_start();
include 'connect.php';

if (!isset($_SESSION['adminname'])) {
   header('location: home.php');
}
$gadgetCount = $pdo->query("SELECT COUNT(g_id) FROM gadget_details")->fetchColumn();
$userCount = $pdo->query("SELECT COUNT(id) FROM register")->fetchColumn();
$feedbackCount = $pdo->query("SELECT COUNT(feedback_id) FROM feedback")->fetchColumn();

?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

   <link rel="preconnect" href="https://fonts.googleapis.com" />
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
   <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />

   <link rel="stylesheet" href="admin.css" />
   <title>Electronic</title>

</head><a class="active" href="admin.php">Dashboard</a>

<body>
   <nav>
      <header><a class="logo" href="admin.php"><img src="image/gadget search-logos/logo.png" alt="" /></a></header>
      <ul class="navbar">
         <li><a class="active" href="admin.php">Dashboard</a></li>
         <li><a href="gadgetdata.php">Electronic items</a></li>
         <li><a href="userdata.php">User data</a></li>
         <li><a href="feedback.php">User feedback</a></li>
      </ul>
   </nav>

   <main>
      <div class="head">
         <i class="fa-solid fa-user"></i>
         <?php echo $_SESSION['adminname'] ?>
         <a href="home.php" class="logout">logout</a>
      </div>
      <div class="grid-container">
         <a href="userdata.php" class="count-item">
            <i class="fa-solid fa-user"></i>
            Total user:
            <?php echo $userCount ?>
         </a>

         <a href="gadgetdata.php" class="count-item">
            <i class="fa-solid fa-laptop-mobile"></i>
            Total items:
            <?php echo $gadgetCount ?>
         </a>

         <a href="feedback.php" class="count-item">
            <i class="fa-solid fa-comment"></i>
            Total feedback:
            <?php echo $feedbackCount ?>
         </a>

      </div>
   </main>
   <script src="javascript.js"></script>
</body>

</html>