<?php
require_once("..\config.php");
session_start();
$user_id = $_SESSION['user_id'];
if(!isset($user_id)){
header('location:..\login.php');
};
$select_users = "SELECT * from users";
$result_users= $conn->query($select_users);
$row = $result_users->fetch_assoc();
if (isset($user_id) && $row['email'] != "admin@ecommerce.com"){
       header("location:..\index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
       <meta charset="UTF-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link rel="stylesheet" href="..\css/all.min.css">
       <link rel="stylesheet" href="..\css/normalize.css">
       <link rel="stylesheet" href="..\css/style.css">
       <title>Admin panal</title>
</head>
<body>
<p>if you need need to insert a new product click <a href="insert.php">here</a></p> 
       <h1> the clothes part </h1>
<?php 
$select = "SELECT * FROM clothes";
$result= $conn->query($select);

if($result->num_rows> 0 ):
       while($row = $result->fetch_assoc()){
              echo " <div ='container'>
              <div class='product'> 
              $row[name] <br>
              $row[price]<br>
              $row[description]<br>
              $row[Amount]<br>
              <img src='$row[image]'>
              <a href='edit.php?id=$row[id]'>edit</a>
       <a href='delete.php?id=$row[id]'>delete</a> 
       </div></div>
       <hr>";
       }
endif
?>
<script src="..\js/script.js"></script>
</body>
</html>