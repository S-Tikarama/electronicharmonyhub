<?php
session_start();
include 'connect.php';

$id = $_GET['id'];
$query = "SELECT * FROM register where id =:id";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':id', $id);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if (isset($_POST['submit'])) {
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $gender = ($_POST['gender']);
    $phnumber = ($_POST['phnumber']);
    $email = ($_POST['email']);
    $address = ($_POST['address']);

    $sql = "UPDATE register SET uname = :uname, email = :email, gender = :gender, phnumber = :phnumber, address = :address WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':uname', $uname);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':gender', $gender);
    $stmt->bindParam(':phnumber', $phnumber);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':id', $id);
    if ($stmt->execute()) {
        echo '<script> alert("User updated successfully."); window.location.href = "user.php"; </script>';
    } else {
        echo "Error updating user: " . $stmt->errorInfo()[2];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style2.css">
    <title>Update</title>
</head>

<body>
    <div class="container1">
        <form action="" method="POST" class="register-form">
            <div>
                <h1>Update Form</h1>
            </div>
            <div class="container">
                <label for="uname">user name:</label>
                <input type="text" id="uname" name="uname" value="<?php echo $result['uname']; ?>" required />
            </div>
            <div class="container">
                <label for="gender">Gender:</label>
                <select name="gender" id="">
                    <option value="not-select">Select</option>
                    <option value="male" <?php
                    if ($result['gender'] == 'male') {
                        echo "selected";
                    }
                    ?>>Male</option>
                    <option value="female" <?php
                    if ($result['gender'] == 'female') {
                        echo "selected";
                    }
                    ?>>Female</option>
                    <option value="other" <?php
                    if ($result['gender'] == 'other') {
                        echo "selected";
                    }
                    ?>>Other</option>
                </select><br>
            </div>
            <div class="container">
                <label for="phone number">Phone Number:</label>
                <input type="number" id="num" name="phnumber" value="<?php echo $result['phnumber']; ?>" required />
            </div>
            <div class="container">
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" value="<?php echo $result['email']; ?>" required />
            </div>
            <div class="container">
                <label for="Address">Address:</label>
                <textarea name="address" id="" cols="30" rows="2"
                    name="address"><?php echo $result['address']; ?></textarea>
            </div>
            <div class="container0">
                <input type="checkbox" required>
                <span>I agree with all thr <strong>term & condition</strong> </span>
            </div>
            <div class="reg-btn">
                <input type="submit" class="submit" name="submit" id="submit" value="update">
            </div>
        </form>
    </div>
</body>

</html>