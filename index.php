<?php
// get DB config file 
require_once('config.php');
session_start();
$user_id = $_SESSION['user_id'];

// Check if the user logged in or no
if(!isset($user_id)){
header('location:login.php');
};

// Redirect the user if he click on logout bottun
if(isset($_GET['logout'])){
       unset($user_id);
       session_destroy();
       header('location:login.php');
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
       <meta charset="UTF-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link rel="stylesheet" href="css/style.css">
       <title>online shop</title>
</head>
<body>
<?php
$select_user = mysqli_query($conn, "SELECT * FROM `users` WHERE id = '$user_id'") or die('query failed');

if(mysqli_num_rows($select_user) > 0){
$fetch_user = mysqli_fetch_assoc($select_user);
}?>
<p>The curent user <span><?php echo $fetch_user['name']; ?></span> </p>
<div class="flex">
<a href="index.php?logout=<?php echo $user_id; ?>" onclick="return confirm('Are you sure to log out?');" class="delete-btn">log out</a>
</div>
<?php
$select ="SELECT * FROM clothes";
$result = $conn->query($select); 

while($row = mysqli_fetch_array($result)){
?>
       <?php foreach($result as $row){
       ?><form method="post" class="box" action="card.php">
       <img src="admin/<?php echo $row['image']; ?>"  width="200">
       <div class="name"><?php echo $row['name']; ?></div>
       <div class="price"><?php echo $row['price']; ?></div>
       <div class="price"><?php echo $row['Amount']; ?></div>
       <input type="number" min="1" name="product_quantity" value="1">
       <input type="hidden" name="product_image" value="<?php echo $row['image']; ?>">
       <input type="hidden" name="product_name" value="<?php echo $row['name']; ?>">
       <input type="hidden" name="product_price" value="<?php echo $row['price']; ?>">
       <input type="submit" value="Add to cart" name="add_to_cart" class="btn">
</form>
<hr>
         <?php      }
              mysqli_close($conn);
              ?>
                     
<?php
};
?>
</div>
<script src="js/script.js"></script>
</body>
</html>