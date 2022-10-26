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
    <h1>Sign Up</h1>
    <div class="user">
        <input type="text" name="name" id="user" required>
        <label for="user">User Name</label>
      </div>
      <div class="user">
        <input type="email" name="email" id="email" required>
        <label for="email">email address</label>
      </div>
      <div class="pas">
        <input type="password" name="password" id="pas" minlength="8" required>
        <label for="pas">Password</label>
      </div>
      <div class="pas">
        <input type="password" name="cpassword" id="pas" required>
        <label for="pas">Password Agin</label>
      </div>
      <div class="sub">
        <button>
          <span></span><span></span><span></span><span></span>
          Submit
          <input type="submit" name="submit" class="btn" value="Register now">
        </button>
        <hr>
        <span class="or">or</span>
        <p>are you have acount ?</p>
        <button class="login" id="log">
          <span></span><span></span><span></span><span></span>
          Sign Up
        </button>
      </div>
  </form>
</main>
<footer><p>Developer by Abdelrhman</p></footer>
<script>
  document.querySelector("#log").onclick = () => {
  window.location.href = "login.php"
  return false;
};
</script>
</body>
</html>