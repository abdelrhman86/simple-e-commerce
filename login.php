<?php
require_once('config.php');
session_start();
if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $select = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');
   if(mysqli_num_rows($select) > 0){
      $row = mysqli_fetch_assoc($select);
      $_SESSION['user_id'] = $row['id'];
      if($email === "admin@ecommerce.com"){
         header("admin/index.php");
      }
      header('location:index.php');
   }
   else{
      $message[] = 'incorrect password or email!';
   }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- بشمهندس معاذ ابقا ضيف صفحات التنسيق هنا عشان مش شغاله وابقا 
   احذف الكومنت دا عشان الفضايح -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/all.min.css">
   <link rel="stylesheet" href="css/normalize.css">
   <title>log in to clouthes house</title>
</head>
<body>
<?php
if(isset($message)){
   foreach($message as $message){
      echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
   }
}
?>   
<div class="form-container">

   <form action="" method="post">
      <h3>sing in</h3>
      <input type="email" name="email" required placeholder="email address" class="box">
      <input type="password" name="password" required placeholder="password" class="box">
      <input type="submit" name="submit" class="btn" value="sign in">
      <p>Are you already don't have account?<a href="register.php">create account</a></p>
   </form>
</div>
<footer><p>Developer by Abdelrhman</p></footer>
<script src="js/script.js"></script>

</body>
</html>