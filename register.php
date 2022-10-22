<?php
require_once ('config.php');
if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));

   $select = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');
   if(mysqli_num_rows($select) > 0){
      $message[] = 'user already exist!';
   }if($pass!= $cpass){
      $message[] ='password and confirem password not are the same !';
   }else{
      mysqli_query($conn, "INSERT INTO `users`(name, email, password) VALUES('$name', '$email', '$pass')") or die('query failed');
      $message[] = 'registered successfully!';
      header('location:login.php');
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register</title>
</head>
<body>
   <style>
      input{
         text-align: center;
      }
   </style>
<?php
if(isset($message)){
   foreach($message as $message){
      echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
   }
}
?>   
<div class="form-container">

   <form action="" method="post">
      <h3>create a new account</h3>
      <input type="text" name="name"  placeholder="username" class="box"required>
      <input type="email" name="email"  placeholder="email address" class="box"required>
      <input type="password" name="password"  placeholder="password" class="box" minlength="8"required>
      <input type="password" name="cpassword"  placeholder="confierm password" class="box"required>
      <input type="submit" name="submit" class="btn" value="Register now">
      <p>are you have acount ?<a href="login.php">log in</a></p>
   </form>
</div>
<footer><p>Developer by Abdelrhman</p></footer>
</body>
</html>