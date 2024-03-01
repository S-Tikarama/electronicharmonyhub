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

   <link rel="stylesheet" href="admin.css" />
   <title>GadgetSearch</title>

</head>

<body>
   <nav>
      <header><a class="logo" href="admin.php"><img src="image/gadget search-logos/logo.png" alt="" /></a></header>
      <ul class="navbar">
         <li><a class="active" href="admin.php">Dashboard</a></li>
         <li><a href="gadgetdata.php">Gadget data</a></li>
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
            Total gadget:
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