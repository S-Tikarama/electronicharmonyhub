<?php
    session_start();
    include 'connect.php';
    
    if (!isset($_SESSION['username'])) {
       header('location: home.php');
       exit(); // Ensure that the script stops here if the user is not logged in.
    }

    $username = $_SESSION['username'];
     // code to get userid
     $stmt = $pdo->prepare("SELECT * FROM register WHERE uname = :username");
     $stmt->bindParam(':username', $username);
     $stmt->execute();
     $uid = $stmt->fetch(PDO::FETCH_COLUMN);


    // code to fetch item from cart
        $sql = "SELECT * FROM cart WHERE user_id=:uid";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':uid', $uid);
        $stmt->execute();
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // total price of individual item
        $i = 0;
        foreach($products as $itotal){
            $inditotal[$i] = $itotal["amount"] * $itotal["quantity"];
            $i++;
        }
        // foreach($inditotal as $sftotal){
          //     $ftotal += $sftotal ;
          
          // }
          // Check if $inditotal is set and is an array
          if (isset($inditotal) && is_array($inditotal)) {
            // Loop through $inditotal if it's an array
            $ftotal=0;
            foreach ($inditotal as $sftotal) {
              $ftotal += $sftotal;
            }
          } else {
            // Handle the case where $inditotal is not set or not an array
            $ftotal = 0;
        }
            
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="cart.css">
</head>
<body>
<div class="container px-3 my-5 clearfix">
    <!-- Shopping cart table -->
    <div class="card">
        <div class="card-header">
            <h2>Shopping Cart</h2>
        </div>
        <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered m-0">
                <thead>
                  <tr>
                    <!-- Set columns width -->
                    <th class="text-center py-3 px-4" style="min-width: 400px;">Product Name &amp; Details</th>
                    <th class="text-right py-3 px-4" style="width: 100px;">Price</th>
                    <th class="text-center py-3 px-4" style="width: 120px;">Quantity</th>
                    <th class="text-right py-3 px-4" style="width: 100px;">Total</th>
                    <th class="text-center align-middle py-3 px-0" style="width: 40px;"><a href="#" class="shop-tooltip float-none text-light" title="" data-original-title="Clear cart"><i class="ino ion-md-trash"></i></a></th>
                  </tr>
                </thead>
                <tbody>
                    <!-- code to list items on cart -->
                <?php
                    foreach($products as $product){
                        $total = $product['amount'] * $product['quantity'];
                        ?>
                    <tr>
                    <td class="p-4">
                      <div class="media align-items-center">
                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="d-block ui-w-40 ui-bordered mr-4" alt="">
                        <div class="media-body">
                          <a href="#" class="d-block text-dark"><?php echo $product['product_name'] ?></a>
                        </div>
                      </div>
                    </td>
                    <td class="text-right font-weight-semibold align-middle p-4">Rs.<?php echo $product['amount'] ?></td>
                    <td class="align-middle p-4"><input type="text" class="form-control text-center" value="<?php echo $product['quantity'] ?>"></td>
                    <td class="text-right font-weight-semibold align-middle p-4">Rs.<?php echo $total ?></td>
                    <td class="text-center align-middle px-0"><a href="#" class="shop-tooltip close float-none text-danger" title="" data-original-title="Remove">×</a></td>
                  </tr>

                   <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- / Shopping cart table -->
        
            <div class="d-flex flex-wrap justify-content-between align-items-center pb-4">
              <!-- <div class="mt-4">
                <label class="text-muted font-weight-normal">Promocode</label>
                <input type="text" placeholder="ABC" class="form-control">
              </div> -->
              <div class="d-flex">
                <!-- <div class="text-right mt-4 mr-5">
                  <label class="text-muted font-weight-normal m-0">Discount</label>
                  <div class="text-large"><strong>$20</strong></div>
                </div> -->
                <div class="text-right mt-4">
                  <label class="text-muted font-weight-normal m-0">Total price</label>
                  <div class="text-large"><strong>Rs.<?php echo $ftotal ?></strong></div>
                </div>
              </div>
            </div>
        
            <div class="float-right">
              <a href="gadget.php"><button type="button" class="btn btn-lg btn-default md-btn-flat mt-2 mr-3">Back to shopping</button></a>
              <?php if($ftotal != 0){?>
                <form action = "checkout.php" method="POST">
                    <input type="number" name="amount" id="amount" value="<?php echo $ftotal ?>" hidden>
                    <input type="text" name="username" id="username" value="<?php echo $username ?>" hidden>
                    <input type="submit" class="btn btn-lg btn-primary mt-2" value = "Checkout">
                </form>
              <?php  }else{ ?>
                <button type="button" class="btn btn-lg btn-primary mt-2">Checkout</button>
                <?php } ?>
                
            </div>
        
          </div>
      </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>