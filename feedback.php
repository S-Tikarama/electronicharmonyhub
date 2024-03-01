<?php
session_start();
include 'connect.php';

if (!isset($_SESSION['adminname'])) {
   header('location: home.php');
}

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
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

   <title>GadgetSearch</title>
</head>

<body>
   <nav>
      <header><a class="logo" href="admin.php"><img src="image/gadget search-logos/logo.png" alt="" /></a></header>
      <ul class="navbar">
         <li><a href="admin.php">Dashboard</a></li>
         <li><a href="gadgetdata.php">Gadget data</a></li>
         <li><a href="userdata.php">User data</a></li>
         <li><a class="active" href="feedback.php">User feedback</a></li>
      </ul>
   </nav>
   <main>
      <div class="data">
         <h1>user feedback</h1>
         <?php
         $query = "SELECT * FROM feedback";
         $stmt = $pdo->prepare($query);
         $stmt->execute();
         $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
         $total = count($data);
         $count = 1;
         if ($total != 0) {
            ?>
            <table border="1">
               <tr>
                  <th>S.N.</th>
                  <th>User Name</th>
                  <th>Feedback</th>
                  <th>Rating</th>
                  <th>Gadget id</th>
                  <th>Operation</th>
                  <th>Update Status</th>
                  <th>Status</th>
               </tr>
               <?php
               foreach ($data as $result) {
                  echo "
                        <tr>
                           <td>" . $count++ . "</td>
                           <td>" . $result['uname'] . "</td>
                           <td>" . $result['feedback'] . "</td>
                           <td>" . $result['rating'] . "</td>
                           <td>" . $result['g_id'] . "</td>
                           <td><a href='deletefeedback.php?id=" . $result['feedback_id'] . "'><input type='submit' value='delete' class='delete' name='delete-user'></a>
                           </td>

                        
                        <td>
                        <select class='form-select' name='status' onchange='updateStatus(this, " . $result['feedback_id'] . ")'>
                            <option value='' disabled selected>Update</option>
                            <option value='Approved'>Approve</option>
                        </select>
                    </td>
                    <td id='status-" . $result['feedback_id'] . "'>" . $result['status'] . "</td>
                    </tr>
                     ";
               }
               ?>
            </table>
            <?php
         }
         ?>
      </div>
   </main>

   <script>
      function updateStatus(selectElement, feedback_id) {
         var status = selectElement.value;
         var xhr = new XMLHttpRequest();
         xhr.open('POST', 'updatestatus.php', true);
         xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

         xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
               var statusCell = document.getElementById('status-' + feedback_id);
               statusCell.textContent = status;
            }
         };

         var data = 'feedback_id=' + encodeURIComponent(feedback_id) + '&status=' + encodeURIComponent(status);
         xhr.send(data);
      }
   </script>
   <script src="javascript.js"></script>
</body>

</html>