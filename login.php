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
  <title>log in to clouthes house</title>
  <!-- بشمهندس معاذ ابقا ضيف صفحات التنسيق هنا عشان مش شغاله وابقا 
  احذف الكومنت دا عشان الفضايح -->
  <!-- normlaiz -->
  <link rel="stylesheet" href="css/normalize.css">
  <!-- icon -->
  <link rel="stylesheet" href="css/all.min.css">
  <!-- main style -->
  <link rel="stylesheet" href="css/login.css">
  <!-- fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
  <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
</head>
<body>
<?php
if(isset($message)){
  foreach($message as $message){
    echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
  }
}
?>
<main>
  <form action="" method="post">
    <h1>Login</h1>
    <div class="user">
      <input type="email" name="email" id="user" required>
      <label for="user">email address</label>
    </div>
    <div class="pas">
      <input type="password" name="password"  id="password" required>
      <label for="password">Password</label>
    </div>
    <div class="sub">
    <button class="subm" name="submit">
      <span></span><span></span><span></span><span></span>
      Log In
    </button>
    <hr>
    <span class="or">or</span>
    <p>Are you already don't have account?</p>
    <button class="sign" id="sig">
    <span></span><span></span><span></span><span></span>
    Sign Up
    </button>
    </div>
  </form>
</main>
<footer><p>Developer by Abdelrhman</p></footer>
<script>
document.querySelector("#sig").onclick = () => {
  window.location.href = "register.php"
  return false;
};
</script>
</body>
</html>