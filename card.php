<?php
require_once("config.php");
session_start();
$user_id = $_SESSION['user_id'];

if(isset($_GET['remove'])){
       $remove_id = $_GET['id'];
       mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$remove_id'") or die('query failed');
       header('location:index.php');
}
if(isset($_GET['delete_all'])){
       mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
       header('location:index.php');
}
if(isset($_POST['update_cart'])){
       $update_quantity = $_POST['cart_quantity'];
       $update_id = $_POST['cart_id'];
       mysqli_query($conn, "UPDATE `cart` SET quantity = '$update_quantity' WHERE id = '$update_id'") or die('query failed');
       $message[] = 'Quantity has been updated successfully!';
}


if(isset($_POST['add_to_cart'])){
       $product_name = $_POST['product_name'];

       $product_price = $_POST['product_price'];

       $product_image = $_POST['product_image'];

       $product_quantity = $_POST['product_quantity'];

       $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');
       if(mysqli_num_rows($select_cart) > 0){
       $message[] = 'the product already added if you want more than one you can edit the number at the bottom!';
       }else{
       mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, image, quantity) VALUES('$user_id', '$product_name', '$product_price', '$product_image', '$product_quantity')") or die('query failed');
       $message[] = 'succsess added to cart!';
       }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
       <meta charset="UTF-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Document</title>
</head>
<body>
       <?php
       if(isset($message)){
       foreach($message as $message){
       echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
       }
}
?>
<h1 class="heading">shopping cart</h1>
<a href="index.php">Home</a>
<table>
<thead>
<th>the image</th>
<th>the name</th>
<th>the price</th>
<th>the quntanty</th>
<th>the total price</th>
<th>action</th>
</thead>
<tbody>
<?php
$cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
$grand_total = 0;
if(mysqli_num_rows($cart_query) > 0){
       while($fetch_cart = mysqli_fetch_assoc($cart_query)){
?>
<tr>
       <td><img src="admin/<?php echo $fetch_cart['image']; ?>" height="75" ></td>
       <td><?php echo $fetch_cart['name']; ?></td>
       <td><?php echo $fetch_cart['price']; ?>$ </td>
       <td>
       <form action="" method="post">
              <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
              <input type="number" min="1" name="cart_quantity" value="<?php echo $fetch_cart['quantity']; ?>">
              <input type="submit" name="update_cart" value="Edit" class="option-btn">
       </form>
       </td>
         <td><?php echo $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']); ?>$</td>
       <td><a href="card.php?remove=<?php echo $fetch_cart['id']; ?>" class="delete-btn" onclick="return confirm('Are you sure to remove the product from the shopping cart?!');">Delete</a></td>
</tr>
<?php
$grand_total += $sub_total;
       }
}else{
       echo '<tr><td style="padding:20px; text-transform:capitalize;" colspan="6">empty</td></tr>';
}

?>
<tr class="table-bottom">
<td colspan="4">the total price</td>
<td><?php echo $grand_total; ?>$</td>
<td><a href="card.php?delete_all" onclick="return confirm('Are you sure to remove all products from the shopping cart');" class="delete-btn <?php echo ($grand_total > 1)?'':'disabled'; ?>">Delete all</a></td>
</tr>
</tbody>
</table>
</div>
</body>
</html>